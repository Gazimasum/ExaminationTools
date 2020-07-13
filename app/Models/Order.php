<?php

namespace App\Models;
use App\User;
use App\Models\Assingment;
use App\Models\Subject;
use App\Models\AssingmentType;
use App\Models\EducationLevel;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
protected $table = 'orders';
    public $fillable = [
        'student_id',
        'order_trace_id',
        'assingments_id',

        'status',

      ];

      public function student()
      {
        return $this->belongsTo('App\User','student_id');
        // return user::where('id',$this->student_id)->first()->name;
      }

      public function completeAssingment()
      {
        return $this->hasOne('App\Models\CompleteAssingment','order_id');
      }

      public function writer()
      {
        return $this->hasOne('App\Models\DealWithWriter','order_id');
        // return user::where('id',$this->student_id)->first()->name;
      }
      public function assingment()
      {
        // return Assingment::where('id',$this->assingments_id)->first()->asssingment_name;
        return $this->belongsTo('App\Models\Assingment','assingments_id');

      }

      public function deal()
      {
    return $this->hasOne('App\Models\DealWithWriter', 'order_id');
      }   
    

      public static function newOrder()
      {
        return Order::where('status',0)->count();
      }
      public static function runningOrder()
      {
        return Order::where('status',2)->count();
      }
      public static function completeOrder()
      {
        return Order::where('status',3)->count();
      }

}
