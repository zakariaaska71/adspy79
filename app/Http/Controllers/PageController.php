<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.page.index')->with('pages',Page::paginate(20));
    }
          public function update_status(Request $request){
        $menu = Page::find($request->pageid);
        $menu->show = $request->show;
        $menu->save();
    
        return response()->json(['message' => 'menu status updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('dashboard.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
        'title' => 'unique:pages,title',
        ]);
        $page = new Page();
        $page->title = $request->title;
        $page->decs = $request->decs;
        $page ->slug = str_replace(' ','_',$request->title);
        $page->show = 1;
        $page->save();
        return redirect()->route('page.index')->with(['success'=>'تم الإضافة بنجاح']);


    }

   
    public function edit($id)
    {
        $page = Page::find($id);
        return view('dashboard.page.edit')->with('page',$page);
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
          $validator = Validator($request->all(), [
        'title'=>'unique:pages,title,'.$page->id,

        ]);
        $page->title = $request->title;
        $page->decs = $request->decs;
        $page ->slug = str_replace(' ','_',$request->title);
        $page->save();
        return redirect()->route('page.index')->with(['success'=>'تم  التعديل بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index')->with(['success'=>'تم  الحذف بنجاح']);

    }
}
