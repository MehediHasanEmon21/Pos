<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Supplier;
use App\Purchase;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PurchaseController extends Controller
{
    public function all_purchase(){

    	$purchases = Purchase::with(['category','supplier','product'])->orderBy('id','DESC')->orderBy('date','desc')->get();
    	return view('pages.purchase.list',compact('purchases'));

    }

     public function approve_purchase(){

    	$purchases = Purchase::with(['category','supplier','product'])->where('status',0)->orderBy('id','DESC')->orderBy('date','desc')->get();
    	return view('pages.purchase.approve_purchase',compact('purchases'));

    }

    public function create(){
    	$suppliers = Supplier::orderBy('name','asc')->get();
    	return view('pages.purchase.create',compact('suppliers'));
    }

    public function store(Request $request){

    	if ($request->category_id == null) {
    		return redirect()->back()->with('error','please insert product first !!');
    	}else{

    		$count_category = count($request->category_id);
    		for ($i=0; $i <$count_category ; $i++) { 
    			$product = new Purchase();
    			$product->date = date('Y-m-d',strtotime($request->date[$i]));
    			$product->purchase_no = $request->purchase_no[$i];
    			$product->supplier_id = $request->supplier_id[$i];
    			$product->category_id = $request->category_id[$i];
    			$product->product_id = $request->product_id[$i];
    			$product->description = $request->description[$i];
    			$product->buying_quantity = $request->buying_qty[$i];
    			$product->unit_price = $request->unit_price[$i];
    			$product->buying_price = $request->buying_price[$i];
    			$product->status = 0;
    			$product->created_by = Auth::id();
    			$product->updated_by = Auth::id();
    			$product->save();
  
    		}

    		return redirect()->back()->with('success', 'product purchase successfully ');

    	}

    }

    public function approve($id){

        $purchase = Purchase::where('id',$id)->first();
        $product = product::where('id',$purchase->product_id)->first();
        $product->quantity = ( (float) $product->quantity ) + ( (float) $purchase->buying_quantity );
        $product->save();
        if ($product->save()) {
            DB::table('purchases')
                ->where('id',$id)
                ->update(['status' => 1]);
        }

        return redirect()->back()->with('success','Product Approve Successfully');


    }
}
