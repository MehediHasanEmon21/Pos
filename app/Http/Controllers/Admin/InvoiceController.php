<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\InvoiceDetail;
use App\Model\Supplier;
use App\Payment;
use App\PaymentDetail;
use App\Purchase;
use App\product;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvoiceController extends Controller
{
    public function all_invoice(){

    	$invoices = Invoice::with(['payment'])->orderBy('id','DESC')->orderBy('date','desc')->where('status',1)->get();
    	return view('pages.invoice.list',compact('invoices'));

    }

    public function create(){
    	$data['categories'] = Category::orderBy('name','asc')->get();
        $data['customers'] = Customer::orderBy('name','asc')->get();
        $invoice_data = Invoice::orderBy('id','DESC')->first();
        if ($invoice_data == null) {
            $firstRegis = 0;
            $data['invoice_no'] = $firstRegis + 1;
        }else{
            $invoice_no = Invoice::orderBy('id','DESC')->first()->invoice_no;
            $data['invoice_no'] = $invoice_no + 1;
        }
    	return view('pages.invoice.create',$data);
    }

    public function store(Request $request){

    	if ($request->category_id == null) {
    		return redirect()->back()->with('error','please insert product first !!');
    	}elseif ($request->paid_amount > $request->estimated_amount) {
            return redirect()->back()->with('error','paid amount must be equal or less than total amount !!');
        }else{

            $invoice = new Invoice();
            $invoice->invoice_no = $request->invoice_no;
            $invoice->date = date('Y-m-d',strtotime($request->date));
            $invoice->description = $request->description;
            $invoice->status = 0;
            $invoice->created_by = Auth::id();

            DB::transaction(function() use ($request,$invoice){

                if ($invoice->save()) {

                    $category_count = count($request->category_id);
                    for ($i=0; $i < $category_count; $i++) { 
                        $in_detail = new InvoiceDetail();
                        $in_detail->invoice_id  = $invoice->id;
                        $in_detail->date  = date('Y-m-d',strtotime($request->date));
                        $in_detail->category_id  = $request->category_id[$i];
                        $in_detail->product_id  = $request->product_id[$i];
                        $in_detail->sellling_qty  = $request->sellling_qty[$i];
                        $in_detail->unit_price  = $request->unit_price[$i];
                        $in_detail->selling_price  = $request->selling_price[$i];
                        $in_detail->save();
                    }

                    $payment = new Payment();
                    $payment_detail = new PaymentDetail();

                    $payment->invoice_id = $invoice->id;
                    if ($request->customer_id == '0') {
                        $customer = new Customer();
                        $customer->name = $request->name;
                        $customer->mobile = $request->mobile;
                        $customer->address = $request->address;
                        $customer->save();
                        $payment->customer_id = $customer->id;
                    }else{
                        $payment->customer_id = $request->customer_id;
                    }

                    $payment->paid_status = $request->paid_status;
                    $payment->total_amount = $request->estimated_amount;
                    $payment->discount_amount = $request->discount_amount;

                    if ($payment->paid_status == 'full_paid') {
                        $payment->paid_amount = $request->estimated_amount;
                        $payment_detail->current_paid_amount = $request->estimated_amount;
                        $payment->due_amount = 0;
                    }elseif($payment->paid_status == 'full_due'){
                        $payment->paid_amount = 0;
                        $payment_detail->current_paid_amount = 0;
                        $payment->due_amount = $request->estimated_amount;
                    }else{
                        $payment->paid_amount = $request->paid_amount;
                        $payment_detail->current_paid_amount = $request->paid_amount;
                        $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                    }

                    $payment_detail->invoice_id = $invoice->id;
                    $payment_detail->date = date('Y-m-d',strtotime($request->date));
                    $payment->save();
                    $payment_detail->save();

                    
            
                }

            });
        }

        return redirect()->route('pending.invoice')->with('success', 'Invoice done successfully ');

    }

    public function pending_invoice(){

        $invoices = Invoice::with(['payment'])->orderBy('id','DESC')->orderBy('date','desc')->where('status',0)->get();
        return view('pages.invoice.pending_invoice',compact('invoices'));


    }

    public function delete_invoice($id){

        $invoice = Invoice::find($id);
        $invoice->delete();
        InvoiceDetail::where('invoice_id',$invoice->id)->delete();
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetail::where('invoice_id',$invoice->id)->delete();

        return redirect()->back()->with('success', 'Invoice Deleted Successfully');

    }

    public function approve_detail($id){

        $invoice = Invoice::with(['payment','invoiceDetails'])->where('id',$id)->first();
        // return response()->json($invoice);
        return view('pages.invoice.approve_invoice',compact('invoice'));
    }

    public function approve(Request $request, $id){

        foreach ($request->sellling_qty as $key => $value) {
           
           $invoice_details = InvoiceDetail::where('id',$key)->first();
           $product = Product::where('id',$invoice_details->product_id)->first();
           if ( $request->sellling_qty[$key] > $product->quantity ) {
               return redirect()->back()->with('error', 'Please check your stock Prduct');
           }

        }

        $invoice = Invoice::where('id',$id)->first();
        $invoice->status = 1;
        $invoice->updated_by = Auth::id();

        DB::transaction(function() use($request,$invoice,$id){

            foreach ($request->sellling_qty as $key => $value) {
           
               $invoice_details = InvoiceDetail::where('id',$key)->first();
               $product = Product::where('id',$invoice_details->product_id)->first();

               $product->quantity = ((float) $product->quantity) - ((float) $request->sellling_qty[$key]);
               $product->save();

            }
            $invoice->save();

        });

        return redirect()->route('invoice.view')->with('success', 'Invoice Approved Successdully');



    }

    public function print_invoice_list(){

        $invoices = Invoice::with(['payment'])->orderBy('id','DESC')->orderBy('date','desc')->where('status',1)->get();
        return view('pages.invoice.print_invoice',compact('invoices'));
    }

    public function print_invoice($id){

        $data['invoice'] = Invoice::with(['payment','invoiceDetails'])->where('id',$id)->first();
        $pdf = PDF::loadView('pages.pdf.invoice-pdf',$data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function daily_report(){
        return view('pages.invoice.daily_invoice_report');
    }

    public function daily_report_pdf(Request $request){

        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        $data['invoices'] = Invoice::with(['payment'])->whereBetween('date',[$start_date,$end_date])->where('status',1)->get();
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $pdf = PDF::loadView('pages.pdf.daily-report-invoice-pdf',$data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');


    }
}
