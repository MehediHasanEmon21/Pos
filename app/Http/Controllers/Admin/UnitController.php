<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;
use Auth;

class UnitController extends Controller
{
    public function all_unit(){

    	$units = Unit::orderBy('id','DESC')->get();
    	return view('pages.unit.list',compact('units'));

    }

    public function create(){
    	return view('pages.unit.create');
    }

    public function store(Request $request){

    	$unit = new Unit();
    	$unit->name = $request->name;
        $unit->created_by = Auth::id();
        $unit->updated_by = Auth::id();
    	$unit->save();
    	return redirect()->route('unit.view')->with('success','Unit Added Successfully');
 


    }
}
