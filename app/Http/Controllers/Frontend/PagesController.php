<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;


class PagesController extends Controller
{
    public function index() {
        return view('frontend.pages.index');
      }
    public function about() {
        return view('frontend.pages.about');
      }
    public function service() {
        return view('frontend.pages.service');
      }
    public function contact() {
        return view('frontend.pages.contact');
      }
    public function trackOrder(Request $r) {
      $order = Order::where('order_trace_id',$r->order_id)->first();
      if ($order) {
        return view('frontend.pages.orderTrack',compact('order'));
      }
      else {
        session()->flash('sticky_error', 'You Have No Order In This ID:'.$r->order_id);
        return back();
      }

      }
}
