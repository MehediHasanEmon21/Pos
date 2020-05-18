<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function all_supplier(){

    	$suppliers = Supplier::orderBy('id','DESC')->get();
    	return view('pages.supplier.list',compact('suppliers'));

    }

    public function create(){
    	return view('pages.supplier.create');
    }

    public function store(Request $request){

    	$request->validate([
    		'email' => 'unique:users'
    	]);
    	$supplier = new supplier();
    	$supplier->name = $request->name;
    	$supplier->email = $request->email;
    	$supplier->mobile = $request->mobile;
    	$supplier->address = $request->address;
        $supplier->created_by = Auth::id();
        $supplier->updated_by = Auth::id();
    	$supplier->save();
    	return redirect()->route('supplier.view')->with('success','Supplier Added Successfully');
 


    }
}
