<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use App\Product;
use App\Unit;
use Auth;
use PDF;
class StockController extends Controller
{
    public function all_stock(){

    	$products = Product::with(['supplier','category','unit'])->orderBy('supplier_id','ASC')->orderBy('category_id','ASC')->get();
    	return view('pages.stock.list',compact('products'));

    }

    public function stock_report_pdf(){

    	$data['products'] = Product::with(['supplier','category','unit'])->orderBy('supplier_id','ASC')->orderBy('category_id','ASC')->get();
        $pdf = PDF::loadView('pages.pdf.stock-report-pdf',$data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
