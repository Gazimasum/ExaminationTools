<?php

namespace App\Http\Controllers\Frontend\Student;
use App\Http\Controllers\Controller;
use App\Notifications\PaymentRecivedNotification;
use App\Models\Order;
use App\Models\Admin;
use App\Models\DealWithStudent;
use App\Models\Payment;
use Illuminate\Http\Request;
use Auth;
use PDF;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $student = Auth::user();
      return view('frontend.pages.student.order', compact('student'));
    }
    public function checkoutview($id)
    {
      $order = DealWithStudent::where('id',$id)->where('is_paid',0)->where('student_id',Auth::id())->first();
      if ($order) {
        return view('frontend.pages.student.payment', compact('order'));
      }
      else {
        abort(404);
      }

    }
    public function checkoutDone(Request $r,$id)
    {
      $admin = Admin::where('type','Super Admin')->get();
      $deal = DealWithStudent::find($id)->first();
      $deal->transection_id = $r->transection_id;
      $deal->payment_date = $r->payment_date;
      $deal->update();
      $pdf = PDF::loadview('backend.pages.student.deal.paidInovice', compact('deal'))->setPaper('a4');

      foreach ($admin as $key => $a) {
        $a->notify(new PaymentRecivedNotification($pdf));
      }
      session()->flash('success', 'Checkout Successfully..Wait For Admin Confirmation.');
      return back();
    }

    public function paidInovice($id)
    {
        $deal = DealWithStudent::findOrFail($id)->first();
        return view('backend.pages.student.deal.paidInovice',compact('deal'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
