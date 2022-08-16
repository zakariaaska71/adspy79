<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        return view('dashboard.video.index')->with('video',Video::first());
    }
    public function store(Request $request){
        $video = Video::first();
         
      
        // dd($request_all);
       $video->update($request->all());
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
        }
}
