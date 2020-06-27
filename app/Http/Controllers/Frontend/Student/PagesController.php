<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssingmentType;
use App\Models\Subject;
use App\Models\EducationLevel;
use App\Models\StudentDetails;
use Auth;

class PagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:web');
  }

  public function index(){
    $student = Auth::user();
    return view('frontend.pages.student.index', compact('student'));

  }
  public function dashboard(){
    $student = Auth::user();
    return view('frontend.pages.student.dashboard', compact('student'));

  }
  public function profile(){
    $student = Auth::user();
    $student_details = StudentDetails::where('student_id',$student->id)->first();
    return view('frontend.pages.student.profile', compact('student','student_details'));

  }
  public function profileEdit(){
    $student = Auth::user();
    $student_details = StudentDetails::where('student_id',$student->id)->first();
    return view('frontend.pages.student.updateprofile', compact('student','student_details'));

  }
  public function assingmentView()
  {
    $assingmenttype = AssingmentType::get();
    $subject = Subject::get();
    $education_level = EducationLevel::get();
      return view('frontend.pages.student.assingmentpost',compact('assingmenttype','subject','education_level'));
  }

  

  public function profileUpdate(Request $r)
  {
    $student = Auth::user();
    $student->phone_no = $r->phone_no;
    $student->update();

    $student_details = StudentDetails::where('student_id',$student->id)->first();

      $student_details->city = $r->city;
      $student_details->optional_email = $r->optional_email;
      $student_details->optional_phone = $r->optional_phone_no;
      $student_details->relation_between = $r->relation_between;
      $student_details->update();

    session()->flash('success', 'Profile Update Successfully');
    return back();
  }

}
