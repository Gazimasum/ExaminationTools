<?php

namespace App\Http\Controllers\Auth\Writer;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

use App\Models\Freelancer;
use App\Models\WriterDetails;
use App\Models\Admin;

use App\Notifications\WriterVerification;
use App\Notifications\WriterRequest;

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
  protected $redirectTo = '/writer';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {

    $this->middleware('guest');
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

    return view('auth.writer.register');
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
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'email', 'max:255', 'unique:freelancers'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'phone_no'=>['regex:/(01)[0-9]{9}/'],

      ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\Admin
  */
  protected function register(Request $request)
  {
    $this->validate($request,
       ['name' => 'required|string|max:255',
       'email' => 'required|email|unique:freelancers',
       'password' => 'required|confirmed|min:6',
       'country_id'=>'required',
       'education_level'=>'required',
       'subjects'=>'required',
       'phone_no'=>'regex:/(01)[0-9]{9}/',
     ],
     [
     'name.required'=>"Please Provide Your Full Name.",

   ]);

    $writer = Freelancer::create([
      'name' => $request->name,
      'phone_no' => $request->phone_no,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'remember_token'  =>Str::random(50),
      'ip_address' => request()->ip(),
    ]);

    $writer_details =new WriterDetails();
    $writer_details->writer_id = $writer->id;
    $writer_details->country_id = $request->country_id;
    $writer_details->city = $request->city;
    $writer_details->education_level = $request->education_level;
    $writer_details->subjects = implode($request->subjects,',');
    $writer_details->save();

    $writer->notify(new WriterVerification($writer));

    $admin = Admin::get();
    foreach ($admin as $a) {
      $a->notify(new WriterRequest);
    }
    Toastr::success('A confirmation email has sent to you.. Please check and confirm your email', 'Success', ["positionClass" => "toast-top-right"]);
   session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');
   return redirect('/writer/register');



  }

}
