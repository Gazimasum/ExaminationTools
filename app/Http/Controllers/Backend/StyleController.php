<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Style;
use Illuminate\Http\Request;
use File;

class StyleController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $style = Style::get();
        return view('backend.pages.style.index',compact('style'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $style = Style::where('id',$id)->first();
        return view('backend.pages.style.edit',compact('style'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $style = Style::where('id',$id)->first();
        $style->name = $request->name;
        $style->background_color = $request->background_color;

        if($request->hasfile('image'))
         {
           if(File::exists('/home-asset/images/'.$style->background_image)){
             File::delete('/home-asset/images/'.$style->background_image);
           }
              $name=time().".".$image->getClientOriginalName();
              $image->move(public_path().'/home-asset/images/', $name);
              $style->background_image=$name;
              $style->save();
         }

        $style->color = $request->color;
        $style->update();
        session()->flash('success', 'Update Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        //
    }
}
