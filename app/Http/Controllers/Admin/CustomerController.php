<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function all_customer(){

    	$customers = Customer::orderBy('id','DESC')->get();
    	return view('pages.customer.list',compact('customers'));

    }

    public function create(){
    	return view('pages.customer.create');
    }

    public function store(Request $request){

    	$request->validate([
    		'email' => 'unique:users'
    	]);
    	$customer = new Customer();
    	$customer->name = $request->name;
    	$customer->email = $request->email;
    	$customer->mobile = $request->mobile;
    	$customer->address = $request->address;
    	$customer->created_by = Auth::id();
    	$customer->updated_by = Auth::id();
    	$customer->save();
    	return redirect()->route('customer.view')->with('success','Customer Added Successfully');
 


    }
}
