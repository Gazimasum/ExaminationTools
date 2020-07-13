<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Notifications\DealNotification;
use App\Notifications\PaidNotification;
use App\Models\DealWithStudent;
use App\User;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
use Auth;

class DealWithStudentController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('deal_std',0)->get();
          return view('backend.pages.student.deal.index',compact('order'));

    }
    public function all()
    {
        $deal = DealWithStudent::get();
          return view('backend.pages.student.deal.all',compact('deal'));

    }
    public function action($id)
    {
        $deal = DealWithStudent::where('id',$id)->first();
        $student = User::where('id',$deal->student_id)->first();
        if($deal->is_paid==0)
          {
            $deal->is_paid=1;
            $deal->update();
            $pdf = PDF::loadview('backend.pages.student.deal.paidInovice', compact('deal'))->setPaper('a4');
            $student->notify(new PaidNotification($pdf));
            return back();
          }
          else {
            $deal->is_paid=0;
            $deal->update();
            return back();
          }

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
      // dd($request);
        $order = Order::where('id',$request->order_id)->where('deal_std',0)->first();
        $order->deal_std = 1;
        $order->update();
      $deal =new DealWithStudent();
      $deal->student_id = $request->student_id;
      $student = User::where('id',$request->student_id)->first();
      $deal->order_id = $request->order_id;
      $deal->currency_id = $request->currency_id;
      $deal->price = $request->price;

      $deal->save();

      // Notifications
      $pdf = PDF::loadview('backend.pages.student.deal.inovice', compact('deal'))->setPaper('a4');
      $student->notify(new DealNotification($pdf));
      session()->flash('success', 'Deal Done successfully');
      $admin = Auth::user();
      return view('backend.pages.index', compact('admin'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DealWithStudent  $dealWithStudent
     * @return \Illuminate\Http\Response
     */
    public function show(DealWithStudent $dealWithStudent)
    {
        //
    }

    public function inovice($id)
    {
        $deal = DealWithStudent::where('id',$id)->first();
        return view('backend.pages.student.deal.inovice',compact('deal'));
    }

    public function paidinvoice($id)
    {
        $deal = DealWithStudent::where('id',$id)->first();
        return view('backend.pages.student.deal.paidInovice',compact('deal'));
    }

    public function deal($id,$o_id)
    {
        $student = User::where('id',$id)->first();
        $order = Order::where('id',$o_id)->first();
        return view('backend.pages.student.deal.deal',compact('student','order'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DealWithStudent  $dealWithStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(DealWithStudent $dealWithStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DealWithStudent  $dealWithStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DealWithStudent $dealWithStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DealWithStudent  $dealWithStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(DealWithStudent $dealWithStudent)
    {
        //
    }
}
