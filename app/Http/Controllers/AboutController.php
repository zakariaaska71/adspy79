<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('dashboard.about.index')->with('about',About::first());
    }
    public function store(Request $request){
    $about = About::first();
     
        $request_all = $request->except(['image']);
        if($request->image != null){
        $request_all['image'] = $request->image->store('about-section');
    }
  
    $about->update($request_all);
    
    // About::create($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
   
}
