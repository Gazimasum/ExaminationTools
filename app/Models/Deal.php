<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
  public function writer()
  {
    return $this->belongsTo('App\Models\Freelancer','client_id');
    // return user::where('id',$this->client_id)->first()->name;
  }
  public function orders()
  {
    // return Assingment::where('id',$this->assingments_id)->first()->asssingment_name;
    return $this->belongsTo('App\Models\Assingment','order_id');

  }
}
