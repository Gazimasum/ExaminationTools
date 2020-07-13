<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealWithWriter extends Model
{
  public function writer()
  {
    return $this->belongsTo('App\Models\Freelancer','client_id');
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

  return Order::where('deal_wrt',0)->count();

  }

  public static function newStdDeal()
  {

  return DealWithWriter::where('writer_id',Auth::id())->where('transection_id',null)->count();

  }
}
