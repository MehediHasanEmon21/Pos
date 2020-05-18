<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Model\Supplier;
use App\Product;
use App\Unit;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function all_product(){

    	$products = Product::with(['supplier','category','unit'])->orderBy('id','DESC')->get();
    	return view('pages.product.list',compact('products'));

    }

    public function create(){
        $suppliers = Supplier::orderBy('name','asc')->get();
        $categories = Category::orderBy('name','asc')->get();
        $units = Unit::orderBy('name','asc')->get();
    	return view('pages.product.create',compact('suppliers','categories','units'));
    }

    public function store(Request $request){

    	
    	$product = new Product();
    	$product->name = $request->name;
    	$product->supplier_id = $request->supplier_id;
    	$product->category_id = $request->category_id;
    	$product->unit_id = $request->unit_id;
        $product->created_by = Auth::id();
        $product->updated_by = Auth::id();
    	$product->save();
    	return redirect()->route('product.view')->with('success','Product Added Successfully');
 


    }
}
