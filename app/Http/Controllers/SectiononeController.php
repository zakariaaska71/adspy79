<?php

namespace App\Http\Controllers;

use App\Sectionone;
use Illuminate\Http\Request;

class SectiononeController extends Controller
{
    public function index(){
        return view('dashboard.section.index')->with('secion',Sectionone::first());
    }
    public function store(Request $request){
    $about = Sectionone::first();
        $request_all = $request->except(['image']);
        if($request->image != null){
          
        $request_all['image'] = $request->image->store('section');
    }
   $about->update($request_all);
    
    // About::create($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
   
}
