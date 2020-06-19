<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\Country;
use App\Models\Subject;
use App\Models\Chat;
use App\Models\EducationLevel;

class WriterController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $writer = Freelancer::where('status',1)->get();
    return view('backend.pages.writer.index',compact('writer'));
  }

  public function request()
  {
    $writer = Freelancer::where('status',0)->get();
    return view('backend.pages.writer.request',compact('writer'));
  }

  public function status($id)
  {
    $writer = Freelancer::find($id)->first();
    if($writer->status==0){
      $writer->status = 1;
      $writer->save();
      session()->flash('success', 'Status Change Successfully');
      return back();
    }
    else {
      $writer->status = 0;
      $writer->save();
      session()->flash('success', 'Status Change Successfully');
        return back();
    }
  }

  public function edit($id)
  {
      $country = Country::get();
      $subject = Subject::get();
      $education_level = EducationLevel::get();
      $writer = Freelancer::find($id)->first();
      return view('backend.pages.writer.edit',compact('writer','country','subject','education_level'));
  }
  public function update(Request $request,$id)
  {
      $writer = Freelancer::find($id)->first();
      $writer->name = $request->name;
      $writer->phone_no = $request->phone_no;
      $writer->email = $request->email;
      $writer->country_id = $request->country_id;
      $writer->city = $request->city;
      $writer->education_level = $request->education_level;
      if ($request->subjects!=$writer->subjects) {
        $writer->subjects = null;
        $writer->subjects =implode($request->subjects,',');
      }else {
      $writer->subjects = $request->subjects;
      }

      $writer->status = $request->status;

      $writer->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $writer = Freelancer::find($id)->first();
      $writer->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }
  public function message()
  {
    $data = Freelancer::where('status',1)->get();
    return view('backend.pages.messages.home',compact('data'));
  }
  public function messageview($id)
  {

    $data = Chat::where('writer_id',$id)->first();
    if ($data==null) {

      return view('backend.pages.messages.messageview',compact('id'));
    }
    else {
      return view('backend.pages.messages.messageview',compact('data'));
    }


  }
}
