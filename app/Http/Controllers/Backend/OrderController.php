<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Deal;
use App\Models\Assingment;


class OrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $order = Order::get();
    return view('backend.pages.order.index',compact('order'));
  }

  public function view($id)
  {
    // $assingment = Assingment::where('id',$id)->first();
    $order = Order::find($id)->first();
    $assingment = Assingment::where('id',$order->assingments_id)->first();

    if ($order->status==0) {
      $order->status = 1;
    }
    $order->update();
    $deal = Deal::where('order_id',$order->id)->first();
    if ($deal) {
      $data=$deal;
        return view('backend.pages.order.view',compact('assingment','order','data'));
    }
    else {
      $data=null;
      return view('backend.pages.order.view',compact('assingment','order','data'));
    }



  }
}
