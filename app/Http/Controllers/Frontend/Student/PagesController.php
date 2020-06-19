<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssingmentType;
use App\Models\Subject;
use App\Models\EducationLevel;
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
  public function assingmentView()
  {
    $assingmenttype = AssingmentType::get();
    $subject = Subject::get();
    $education_level = EducationLevel::get();
      return view('frontend.pages.student.assingmentpost',compact('assingmenttype','subject','education_level'));
  }

}
