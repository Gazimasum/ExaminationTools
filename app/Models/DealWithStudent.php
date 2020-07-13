<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class DealWithStudent extends Model
{
  public function student()
  {
    return $this->belongsTo('App\User','student_id');
    // return user::where('id',$this->student_id)->first()->name;
  }
public function currency()
  {
    return $this->belongsTo('App\Models\Currency','currency_id');
    // return user::where('id',$this->student_id)->first()->name;
  }

  public function order()
  {
    // return Assingment::where('id',$this->assingments_id)->first()->asssingment_name;
    return $this->belongsTo('App\Models\Order','order_id');

  }
  public static function newDeal()
  {

  return Order::where('deal_std',0)->count();

  }
  public static function newStdDeal()
  {

  return DealWithStudent::where('student_id',Auth::id())->where('transection_id',null)->count();

  }



}
