<?php

namespace App\Http\Controllers\Frontend\Student;
use App\Http\Controllers\Controller;
use App\Notifications\PaymentRecivedNotification;
use App\Models\Order;
use App\Models\Admin;
use App\Models\DealWithStudent;
use App\Models\CompleteAssingment;
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
      $deal = DealWithStudent::where('id',$id)->first();
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
        $deal = DealWithStudent::where('id',$id)->first();
        return view('backend.pages.student.deal.paidInovice',compact('deal'));
    }
    
    public function complete()
    {
        $completeAssingment = CompleteAssingment::where('student_id',Auth::id())->get();
        return view('frontend.pages.student.complete',compact('completeAssingment'));
    }
      public function completeView($id)
    {
        $completeAssingment = CompleteAssingment::where('id',$id)->where('student_id',Auth::id())->first();
        $completeAssingment->status=1;
        $completeAssingment->update();
        return view('frontend.pages.student.completeView',compact('completeAssingment'));
    }

    
}
