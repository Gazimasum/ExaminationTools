<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\StudentDetails;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\VerifyRegistration;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:writer');
    }
    public function index()
    {

      return view('auth.register');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no'=>['number','min:11'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'phone_no' => $data['phone_no'],
    //         'country_id' => $data['country_id'],
    //         'city' => $data['city'],
    //         'ip_address' => $data->ip();
    //         'password' => Hash::make($data['password']),
    //
    //     ]);
    // }
    protected function register(Request $request)
    {
      $this->validate($request,
         ['name' => 'required|string|max:255',
         'email' => 'required|email|unique:users',
         'password' => 'required|confirmed|min:6',

       ],
       [
       'name.required'=>"Please Provide a Full Name.",

     ]);



      $user = User::create([
        'name' => $request->name,
        'phone_no' => $request->phone_no,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'remember_token'  =>Str::random(50),
        'ip_address' => request()->ip(),

      ]);
      $student_details = new StudentDetails();
      $student_details->student_id = $user->id;
      $student_details->country_id = $request->country_id;
      $student_details->save();
      $user->notify(new VerifyRegistration($user));

     session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');
     return redirect('student/registration');
    }


}
