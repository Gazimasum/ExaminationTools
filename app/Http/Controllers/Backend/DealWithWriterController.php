<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Notifications\DealNotification;
use App\Models\DealWithWriter;
use App\Notifications\PaidNotification;
use App\Notifications\PaymentRecivedNotification;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Freelancer;
use PDF;

class DealWithWriterController extends Controller
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
         $writer = Freelancer::where('status',1)->get();
           return view('backend.pages.writer.deal.index',compact('writer'));

     }
     public function all()
     {
         $deal = DealWithWriter::get();
        return view('backend.pages.writer.deal.all',compact('deal'));
     }

     public function deal($id)
     {
       $writer = Freelancer::find($id)->first();
       $assingment = Order::where('status',1)->get();

       return view('backend.pages.writer.deal.deal',compact('writer','assingment'));
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
      $order = Order::where('assingments_id',$request->assingment_id)->first();
      $order->status = 2;
      $order->deal_wrt = 1;
      $writer = Freelancer::find($request->client_id)->first();
      $deal =new DealWithWriter();
      $deal->client_id = $request->client_id;
      $deal->order_id = $order->id;
      $deal->price = $request->price;

      $order->update();
      $deal->save();
      $pdf = PDF::loadview('backend.pages.writer.deal.inovice', compact('deal'))->setPaper('a4');

      $writer->notify(new DealNotification($pdf));
      session()->flash('success', 'Deal Done successfully');
      return back();

    }


    public function inovice($id)
    {
        $deal = DealWithWriter::find($id)->first();
        return view('backend.pages.writer.deal.inovice',compact('deal'));
    }
    public function paidInovice($id)
    {
        $deal = DealWithWriter::find($id)->first();
        return view('backend.pages.writer.deal.paidInovice',compact('deal'));
    }
    public function checkoutView($id)
    {
        $deal = DealWithWriter::find($id)->first();
        return view('backend.pages.writer.deal.checkout',compact('deal'));
    }
    public function checkoutDone(Request $request,$id)
    {
        $deal = DealWithWriter::find($id)->first();
        $writer = Freelancer::where('id',$deal->client_id)->first();
        $deal->is_paid = 1;
        $deal->transection_id = $request->transection_id;
        $deal->payment_date = $request->payment_date;
        $deal->update();

        $pdf = PDF::loadview('backend.pages.writer.deal.paidInovice', compact('deal'))->setPaper('a4');
        $writer->notify(new PaymentRecivedNotification($pdf));
        session()->flash('success', 'Payment Done successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DealWithWriter  $dealWithWriter
     * @return \Illuminate\Http\Response
     */
    public function show(DealWithWriter $dealWithWriter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DealWithWriter  $dealWithWriter
     * @return \Illuminate\Http\Response
     */
    public function edit(DealWithWriter $dealWithWriter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DealWithWriter  $dealWithWriter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DealWithWriter $dealWithWriter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DealWithWriter  $dealWithWriter
     * @return \Illuminate\Http\Response
     */
    public function destroy(DealWithWriter $dealWithWriter)
    {
        //
    }
}
