<?php

namespace App\Http\Controllers;

use App\Sectionthree;
use Illuminate\Http\Request;

class SectionthreeController extends Controller
{
    public function index(){
        return view('dashboard.section3.index')->with('secion',Sectionthree::first());
    }
    public function store(Request $request){
    $about = Sectionthree::first();
     
        $request_all = $request->except(['image']);
        if($request->image != null){
        $request_all['image'] = $request->image->store('about-section');
    }
  
    $about->update($request_all);
    
    // About::create($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
   
}
