<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WriterDetails extends Model
{
  public function country(){
    return $this->belongsTo(Country::class);
  }

  public  function educationlevel(){
    // return EducationLevel::where('id',$this->education_level)->first()->name;
    return $this->belongsTo('App\Models\EducationLevel','education_level');
  }

}
