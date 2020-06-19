<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assingment extends Model
{
  public function images(){
    return $this->hasMany(AssingmentImage::class);
  }
  public function files(){
    return $this->hasMany(AssingmentFile::class);
  }
  public function type(){
    return $this->belongsTo(AssingmentType::class);
  }

  public function education_level(){
    return $this->belongsTo(EducationLevel::class);
  }
  
  public function subject(){
    return $this->belongsTo(Subject::class);
  }

  public function paper_lengths(){
    return $this->belongsTo(PaperLength::class);
  }
}
