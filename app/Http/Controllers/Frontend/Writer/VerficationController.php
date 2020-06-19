<?php

namespace App\Http\Controllers\Frontend\Writer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Freelancer;

class VerficationController extends Controller
{



  public function verify($token)
  {
    $writer = Freelancer::where('remember_token', $token)->first();
    if (!is_null($writer)) {
      $writer->remember_token = NULL;
      $writer->save();
      session()->flash('success', 'You are registered successfully !! After Admin verification You Can Login');
      return redirect('/writer/login');
      }else {
      session()->flash('errors', 'Sorry !! Your token is not matched !!');
      return redirect('/writer/register');
    }

  }
}
