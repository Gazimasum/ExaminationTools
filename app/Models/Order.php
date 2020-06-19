<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function user()
  {
    public $fillable = [
        'client_id',
        'order_trace_id',
        'assingments_id',
        'ip_address',
        'price',
        'is_paid',
        'status',
        'payment_date',
        ,'transection_id'
      ];

      public function user()
      {
        return $this->belongsTo(User::class);
      }
      public function assingment()
      {
        return $this->belongsTo(Assingment::class);
      }

  }
}
