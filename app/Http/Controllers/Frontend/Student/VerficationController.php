<?php

namespace App\Http\Controllers\Frontend\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class VerficationController extends Controller
{



  public function verify($token)
  {
    $student = User::where('remember_token', $token)->first();
    if (!is_null($student)) {
      $student->remember_token = NULL;
      $student->status =1;
      $student->save();
      session()->flash('success', 'You are registered successfully !! After Admin verification You Can Login');
      return redirect('/login');
      }else {
      session()->flash('error', 'Sorry !! Your token is not matched !!');
      return redirect('/student/registration');
    }

  }
}
