<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\WriterPasswordResetNotification;
use App\Models\EducationLevel;;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class Freelancer extends Authenticatable
{
    use Notifiable;

 protected $guard = 'worker';

    protected $fillable = [
        'name', 'phone_no', 'country_id','city', 'ip_address', 'remember_token', 'email', 'password','education_level','subjects',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
      $this->notify(new WriterPasswordResetNotification($token));
    }

    public function country(){
      return $this->belongsTo(Country::class);
    }
    public  function educationlevel(){
      return EducationLevel::where('id',$this->education_level)->first()->name;
      // return $this->belongsTo(EducationLevel::class);
    }
    public  function educationlevelid(){
      return EducationLevel::where('id',$this->education_level)->first()->id;
      // return $this->belongsTo(EducationLevel::class);
    }

    public static function writerRequest()
    {
      return Freelancer::where('status',0)->count();
    }


    public static function writerReq()
    {
      return Freelancer::where('status',0)->count();
    }
    public static function totalWriter()
    {
      return Freelancer::where('status',1)->count();
    }
    public function isOnline()
    {
       return Cache::has('user-is-online-' . $this->id);
    }
}
