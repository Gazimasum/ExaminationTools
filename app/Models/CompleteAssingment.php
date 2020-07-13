<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompleteAssingment extends Model
{
    public function order()
  {
    // return Assingment::where('id',$this->assingments_id)->first()->asssingment_name;
    return $this->belongsTo('App\Models\Order','order_id');

  }
    public function files(){
    return $this->hasMany('App\Models\CompleteFile','complete_id');
  }

  public static function completeCount()
  {
  	return CompleteAssingment::where('status',0)->count();
  }
  public static function newStdComOrder($id)
  {
    return CompleteAssingment::where('student_id',$id)->where('status',0)->count();
  }



}
