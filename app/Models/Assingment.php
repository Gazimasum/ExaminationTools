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
  public function type(){
    return $this->belongsTo('App\Models\AssingmentType','assingment_type_id');
  }

  public function education_level(){
    return $this->belongsTo(EducationLevel::class);
  }

  public function subject(){
  return $this->belongsTo('App\Models\Subject','assingment_subject_id');
  }


  public function paper_lengths(){
    return $this->belongsTo(PaperLength::class);
  }
}
