<?php

namespace App\Http\Controllers\Auth\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\WriterVerification;
use App\Models\Freelancer;
use Illuminate\Http\Request;

use Auth;


class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/writter';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
         $this->middleware('guest:admin')->except('logout');
         $this->middleware('guest:writer')->except('logout');
  }

  public function showLoginForm()
  {
     return view('auth.writer.login', ['url' => 'writer']);
  }


  public function login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    //Find User by this email
    $writer = Freelancer::where('email', $request->email)->first();
      if (!is_null($writer)) {
        if ($writer->status == 1) {
          // login This User

          if (Auth::guard('writer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Log Him Now
            Toastr::success('Successfully Login..', 'Success', ["positionClass" => "toast-top-right"]);
            // session()->flash('success','Successfully Login....');
            return redirect()->intended(route('writer.dashboard'));
          }else {
            // Toastr::error('Wrong Password!!', 'Error', ["positionClass" => "toast-top-center"]);
            session()->flash('sticky_error','Wrong Password!! You have No account in this Email..');
            return back();
          }
        }
        else if($writer->remember_token!=null) {
          // Send him a token again
          if (!is_null($writer)) {
            $writer->notify(new WriterVerification($writer));
            // Toastr::success('A New confirmation email has sent to you.. Please check and confirm your email', 'Success', ["positionClass" => "toast-top-center"]);
            session()->flash('success',' A New confirmation email has sent to you.. Please check and confirm your email !!');
            return redirect('/');
          }else {
            // Toastr::warning('Please login first !!', 'warning', ["positionClass" => "toast-top-center"]);
            session()->flash('sticky_error',' Please login first !!');
            return redirect()->route('writer.login');
          }
        }
        else {
          session()->flash('sticky_error','Your Account is Verified.. Please Wait Until Approved Your Account !!');
          return redirect()->route('writer.login');
        }
      }
        else {
            // Toastr::error('Invalid Login!! You have No account in this Email.. ', 'warning', ["positionClass" => "toast-top-center"]);
            session()->flash('sticky_error','Invalid Login!! You have No account in this Email..');
            return back();
        }

  }

  public function logout(Request $request)
  {
    $this->guard()->logout();

    $request->session()->invalidate();

    return redirect()->route('writer.login');
  }


}
