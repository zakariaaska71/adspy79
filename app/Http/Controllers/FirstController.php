<?php

namespace App\Http\Controllers;

use App\First;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
        return view('dashboard.first.index')->with('first',First::first());
    }
    public function store(Request $request){
    $first = First::first();
     
        $request_all = $request->except(['image']);
        if($request->image != null){
        $request_all['image'] = $request->image->store('first-section');
    }
  
    // dd($request_all);
    $first->update($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
   
}
