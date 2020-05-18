<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function all_category(){

    	$categorys = Category::orderBy('id','DESC')->get();
    	return view('pages.category.list',compact('categorys'));

    }

    public function create(){
    	return view('pages.category.create');
    }

    public function store(Request $request){

    	$category = new Category();
    	$category->name = $request->name;
    	$category->created_by = Auth::id();
    	$category->updated_by = Auth::id();
    	$category->save();
    	return redirect()->route('category.view')->with('success','category Added Successfully');
 


    }
}
