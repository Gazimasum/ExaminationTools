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
      public function writer()
      {
        return $this->belongsTo('App\Models\Freelancer','student_id');
        // return user::where('id',$this->student_id)->first()->name;
      }
      public function assingment()
      {
        // return Assingment::where('id',$this->assingments_id)->first()->asssingment_name;
        return $this->belongsTo('App\Models\Assingment','assingments_id');

      }
      public function assingmentSubject()
      {
        $assingment= Assingment::where('id',$this->assingments_id)->first();
        return Subject::where('id',$assingment->assingment_subject_id)->first()->name;
      }
      public function assingmentType()
      {
        $assingment= Assingment::where('id',$this->assingments_id)->first();
        return AssingmentType::where('id',$assingment->assingment_type_id)->first()->name;
      }
      public function assingmentLevel()
      {
        $assingment= Assingment::where('id',$this->assingments_id)->first();
        return EducationLevel::where('id',$assingment->assingment_type_id)->first()->name;
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
