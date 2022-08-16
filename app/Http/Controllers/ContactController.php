<?php

namespace App\Http\Controllers;

use App\Conteactsection;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('dashboard.countact.section')->with('contact',Conteactsection::first());
    }
    public function store(Request $request){
        $about = Conteactsection::first();
     
        $request_all = $request->except(['image']);
        if($request->image != null){
        $request_all['image'] = $request->image->store('contact-section');
    }
  
    $about->update($request_all);
    
    // Conteactsection::create($request_all);
    return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
    }
}
