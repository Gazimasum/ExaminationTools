<?php

namespace App\Http\Controllers\Backend;

use App\Models\EducationLevel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EducationLevelController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $educationlevel = EducationLevel::get();
    return view('backend.pages.educationlevel.index',compact('educationlevel'));
  }
  public function create()
  {

    return view('backend.pages.educationlevel.create');
  }


  public function edit($id)
  {
      $educationlevel = EducationLevel::where('id',$id)->first();
      return view('backend.pages.educationlevel.edit',compact('educationlevel'));
  }
  public function store(Request $request)
  {
      $educationlevel = new EducationLevel();
      $educationlevel->name = $request->name;
      $educationlevel->priority = $request->priority;
      $educationlevel->save();
      session()->flash('success', 'Store Successfully');
      return back();
  }
  public function update(Request $request,$id)
  {
      $educationlevel = EducationLevel::where('id',$id)->first();
      $educationlevel->name = $request->name;
      $educationlevel->priority = $request->priority;
      $educationlevel->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $educationlevel = EducationLevel::where('id',$id)->first();
      $educationlevel->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }
}
