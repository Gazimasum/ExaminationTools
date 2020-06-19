<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\VerifyRegistration;
use App\Models\Country;

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
      $country = Country::orderBy('priority','asc')->get();
      return view('auth.register',compact('country'));
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
            'phone_no'=>['required','number','min:11'],
            'country_id'=>['required'],
            'city'=>['required'],

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
      $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
      $user = User::create([
        'name' => $request->name,
        'phone_no' => $request->phone_no,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'remember_token'  =>Str::random(50),
        'country_id' => $request->country_id,
        'city' => $request->city,
        'ip_address' => request()->ip(),
        'avater' =>Null,
      ]);
      $user->notify(new VerifyRegistration($user));

     session()->flash('success', 'A confirmation email has sent to you.. Please check and confirm your email');
     return redirect('student/registration');
    }

    else {
    session()->flash('warning', 'This Email is Allready Registered');
    return redirect('student/registration');
    }


    }


}
