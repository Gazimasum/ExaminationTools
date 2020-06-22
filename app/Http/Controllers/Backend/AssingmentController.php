<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Assingment;
use Auth;

class AssingmentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $order = Order::get();
    return view('backend.pages.assingment.index',compact('order'));
  }

  public function view($id)
  {
    $assingment = Assingment::where('id',$id)->first();
    $order = Order::where('assingments_id',$id)->first();
    if ($order->status==0) {
      $order->status = 1;
    }
    $order->update();
    return view('backend.pages.assingment.view',compact('assingment','order'));
  }

}
