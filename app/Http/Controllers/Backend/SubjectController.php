<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $subject = Subject::get();
    return view('backend.pages.subject.index',compact('subject'));
  }
  public function create()
  {

    return view('backend.pages.subject.create');
  }


  public function edit($id)
  {
      $subject = Subject::where('id',$id)->first();
      return view('backend.pages.subject.edit',compact('subject'));
  }
  public function store(Request $request)
  {
      $subject = new Subject();
      $subject->name = $request->name;
      $subject->priority = $request->priority;
      session()->flash('success', 'Store Successfully');
      $subject->save();
      return back();
  }
  public function update(Request $request,$id)
  {
      $subject = Subject::where('id',$id)->first();
      $subject->name = $request->name;
      $subject->priority = $request->priority;
      $subject->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $subject = Subject::where('id',$id)->first();
      $subject->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }
}
