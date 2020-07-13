<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssingmentType;
use Illuminate\Http\Request;

class AssingmentTypeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $assingmenttype = AssingmentType::get();
    return view('backend.pages.assingmenttype.index',compact('assingmenttype'));
  }
  public function create()
  {

    return view('backend.pages.assingmenttype.create');
  }


  public function edit($id)
  {
      $assingmenttype = AssingmentType::where('id',$id)->first();
      return view('backend.pages.assingmenttype.edit',compact('assingmenttype'));
  }
  public function store(Request $request)
  {
      $assingmenttype = new AssingmentType();
      $assingmenttype->name = $request->name;
      $assingmenttype->priority = $request->priority;
      $assingmenttype->save();
      session()->flash('success', 'Store Successfully');
      return back();
  }
  public function update(Request $request,$id)
  {
      $assingmenttype = AssingmentType::where('id',$id)->first();
      $assingmenttype->name = $request->name;
      $assingmenttype->priority = $request->priority;
      $assingmenttype->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $assingmenttype = AssingmentType::where('id',$id)->first();
      $assingmenttype->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }
}
