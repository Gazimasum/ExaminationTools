<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assingment extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User','student_id');

  }
  public function images(){
    return $this->hasMany(AssingmentImage::class);
  }
  public function orders(){
    return $this->hasOne(Order::class);
  }
  public function files(){
    return $this->hasMany(AssingmentFile::class);
  }

}
