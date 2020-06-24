<?php

namespace App\Http\Controllers\Auth\Writer;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

use App\Models\Freelancer;
use App\Models\Country;
use App\Models\EducationLevel;
use App\Models\Subject;
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
  protected $redirectTo = '/';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {

      $this->middleware('guest:writer');
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

    $country = Country::orderBy('priority','asc')->get();
    $education_level = EducationLevel::orderBy('priority','asc')->get();
    $subject = Subject::orderBy('priority','asc')->get();
    return view('auth.writer.register',compact('country','education_level','subject'));
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
          'phone_no'=>['required|regex:/(01)[0-9]{9}/'],
          'country_id'=>['required'],
          'city'=>['required'],
          'education_level'=>['required'],
          'subjects'=>['required'],

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
    $writer = Freelancer::where('email', $request->email)->first();
      if (is_null($writer)) {
    $writer = Freelancer::create([
      'name' => $request->name,
      'phone_no' => $request->phone_no,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'remember_token'  =>Str::random(50),
      'country_id' => $request->country_id,
      'city' => $request->city,
      'education_level' => $request->education_level,
      'subjects' =>implode($request->subjects,','),
      'ip_address' => request()->ip(),
      'avater' =>Null,
    ]);
    $writer->notify(new WriterVerification($writer));

    $admin = Admin::get();
    foreach ($admin as $a) {
      $a->notify(new WriterRequest);
    }
   session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');
   return redirect('/writer/register');
  }

else {
  session()->flash('warning', 'This Email is Allready Registered');
  return redirect('/writer/register');
}


  }

}
