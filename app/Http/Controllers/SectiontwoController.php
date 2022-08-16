<?php

namespace App\Http\Controllers;

use App\Sectiontwo;
use Illuminate\Http\Request;

class SectiontwoController extends Controller
{
    public function index(){
        return view('dashboard.section3.index')->with('secion',Sectiontwo::first());
    }
    public function store(Request $request){
    $about = Sectiontwo::first();
     
        $request_all = $request->except(['image']);
        if($request->image != null){
        $request_all['image'] = $request->image->store('about-section');
    }
  
    Sectiontwo::create($request_all);
    
    // About::create($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
   
}
