<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
   public function getCategory(Request $request){

   		$categories = Product::with(['category'])->select('category_id')->where('supplier_id',$request->supplier_id)->groupBy('category_id')->get();
   		return response()->json($categories);
   }

   public function getProduct(Request $request){

   		$products = Product::where('category_id',$request->category_id)->get();
   		return response()->json($products);

   }

   public function getStock(Request $request){

   		$id = $request->product_id;
   		$quantity = Product::where('id',$id)->first()->quantity;
   		return response()->json($quantity);


   }
}
