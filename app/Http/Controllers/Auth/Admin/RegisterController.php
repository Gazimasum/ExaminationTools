<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\Division;
use App\Models\District;

use App\Notifications\Adminverification;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = '/';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

/**
 * @override
 * showRegistrationForm
 *
 * Display the registration form
 *
 * @return void view
 */
  public function showRegistrationForm()
  {

    return view('auth.admin.adminregister');
  }


  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|string|max:30',

      'email' => 'required|string|email|max:100|unique:users',
      'password' => 'required|string|min:6|confirmed',

      'phone_no' => 'required|max:15',

    ]);

  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\Admin
  */
  protected function adminregister(Request $request)
  {

    $admin = Admin::create([
      'name' => $request->name,
      'phone_no' => $request->phone_no,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'remember_token'  =>str_random(50),
      'avater' =>Null,
    ]);

     $admin->notify(new Adminverification($admin));

    session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');
    return redirect('/admin/register');


  }

}
