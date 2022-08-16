<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('dashboard.blog.index')->with('blogs',Blog::get());
    }
    public function create(){
        return view('dashboard.blog.create');
    }
    public function store(Request $request){
        $request->validate([

        'title'=>'required|unique:blogs,title'
        ]);
        $request_all = $request->except(['image']);
        $request_all['slug']= str_replace(' ','_',$request->title);
        $request_all['image']= $request->image->store('blog');
        $request_all['status']= 'yes';
        Blog::create($request_all);
        return redirect()->route('blog.index')->with(['success'=>'تم الإضافة بنجاح']);
    }
    public function edit($id){
        return view('dashboard.blog.edit')->with('blog',Blog::find($id));

    }
    public function update(Request $request,$id){
      $blog=  Blog::find($id);
      $request->validate([

        'title'=>'required',
    ]);
      if(Blog::where('title',$request->title)->where('_id','!=',$id)->first()){
          return back()->with(['error'=>'The title has already been taken.']);
      }
        // dd($request_all['slug']);
      $request_all = $request->except(['image']);
    if($request->image != null){
        $request_all['image']= $request->image->store('blog');

    }
    $request_all['slug']= str_replace(' ','_',$request->title);

    $blog->update($request_all);
    return redirect()->route('blog.index')->with(['success'=>'تم التعديل بنجاح']);

    }
    public function destroy($id){
        // dd('dd');
        $blog=  Blog::find($id);
        $blog->destroy($id);
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
    public function update_status(Request $request){
        $blog = Blog::findOrFail($request->blogid);
        $blog->status = $request->status;
        $blog->save();
    
        return response()->json(['message' => 'blog status updated successfully.']);
    }

}
