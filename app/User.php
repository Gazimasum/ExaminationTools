<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Country;
use App\Models\Order;
use App\Models\Chat;
use Cache;

class User extends Authenticatable
{
    use Notifiable;
protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone_no', 'ip_address', 'remember_token','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function totalStudent()
    {
      return User::count();
    }

    public function isOnline()
    {
       return Cache::has('user-is-online-' . $this->id);
    }

    public function order(){
      return $this->hasMany(Order::class);
    }

    public function details()
   {
       return $this->hasOne('App\Models\StudentDetails','student_id');
   }

   public static function msgStudent($id)
   {
     return Chat::where('user_id',$id)->where('is_seen',0)->count();
   }
}
