<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Deal;
use App\Models\Assingment;
use App\Models\DealWithWriter;
use App\Models\CompleteAssingment;
use App\Models\CompleteFile;
use File;

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
    $order = Order::where('id',$id)->first();
    $deal = DealWithWriter::where('order_id',$order->id)->first();
    $assingment = Assingment::where('id',$order->assingments_id)->first();

    if ($order->status==0) {
      $order->status = 1;
    }
    $order->update();

    if ($deal) {
      $data=$deal;
        return view('backend.pages.order.view',compact('assingment','order','data'));
    }
    else {
      $data=null;
      return view('backend.pages.order.view',compact('assingment','order','data'));
    }



  }

  public function complete()
  {
    $order = CompleteAssingment::where('status',0)->get();
    // $writer = DealWithWriter::where('order_id',$order->id)->first();
    return view('backend.pages.order.complete',compact('order'));
  }
   public function completeView($id)
  {
    $c_order = CompleteAssingment::where('order_id',$id)->first();
    
    // $writer = DealWithWriter::where('order_id',$order->id)->first();
    return view('backend.pages.order.completeOrderView',compact('c_order'));
  }

  public function changeCompleteOrder(Request $request,$id)
  {
    

    if ($request->hasfile('file')) {
      $oldfile = CompleteFile::where('id',$id)->first();

     if(File::exists('files/others/'.$oldfile->file)){
            File::delete('files/others/'.$oldfile->file);
          }
           $newfile = $request->file('file');
            $name=time().".".$newfile->getClientOriginalName();
           $newfile->move(public_path().'/files/others/', $name);
           
           $oldfile->file=$name;
           
           $oldfile->update();    
            session()->flash('success', 'File Change successfully');
            return back();
  }
}
}
