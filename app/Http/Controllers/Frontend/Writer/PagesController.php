<?php

namespace App\Http\Controllers\Frontend\Writer;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Auth;
use App\Models\WriterDetails;
use App\Models\Chat;
use App\Models\Order;
use App\Models\DealWithWriter;
use App\Models\CompleteAssingment;
use App\Models\CompleteFile;

class PagesController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:writer');
    }

    public function index(){
      $writer = Auth::user();
      return view('frontend.pages.index', compact('writer'));

    }
    public function dashboard(){
      $writer = Auth::user();
      if ($writer->details->payment_details==null) {
        session()->flash('warning', 'Added Your Payment Details');
        // Toastr::warning('Added Your Payment Details', 'Warning', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
      }
      $assingment = DealWithWriter::where('client_id',$writer->id)->get();
      return view('frontend.pages.writer.dashboard', compact('writer','assingment'));

    }
    public function profile(){
      $writer = Auth::user();
      $writer_details = WriterDetails::where('writer_id',$writer->id)->first();
      return view('frontend.pages.writer.profile', compact('writer','writer_details'));

    }
    public function profileEdit(){
      $writer = Auth::user();
      $writer_details = WriterDetails::where('writer_id',$writer->id)->first();
      return view('frontend.pages.writer.updateprofile', compact('writer','writer_details'));

    }
    public function order(){
      $writer = Auth::user();
      return view('frontend.pages.writer.order', compact('writer'));

    }
    public function ordershow($id){
      $assingment = DealwithWriter::where('client_id',Auth::id())->where('order_id',$id)->first();
      if ($assingment) {
        return view('frontend.pages.writer.assingmentView', compact('assingment'));
      }
      else {
        abort(404);
      }


    }

    public function profileUpdate(Request $r)
    {
        $writer = Auth::user();
        $writer->phone_no = $r->phone_no;
        $writer->update();
        $writer_details = WriterDetails::where('writer_id',$writer->id)->first();
        $writer_details->optional_email = $r->optional_email;
        $writer_details->optional_phone = $r->optional_phone;
        $writer_details->relation_between = $r->relation_between;
        $writer_details->payment_details = $r->payment_details;
        $writer_details->update();
      session()->flash('success', 'Profile Update Successfully');
      return back();
    }


public function complete($id)
{
  $assingment = DealwithWriter::where('client_id',Auth::id())->where('order_id',$id)->first();
  return view('frontend.pages.writer.deliver',compact('assingment'));
}

public function deliver(Request $request,$id)
{
  $order = Order::where('id',$id)->first();
  $order->status=3;
  $order->update();
 $completeAssingment = new CompleteAssingment();
 $completeAssingment->writer_id = Auth::id();
 $completeAssingment->order_id = $id;
 $completeAssingment->save();
  
  if($request->hasfile('files'))
      {
         foreach($request->file('files') as $files)
         {
           $name=time().".".$files->getClientOriginalName();
           $files->move(public_path().'/files/others/', $name);
            $CompleteFile = new CompleteFile();
           $CompleteFile->file=$name;
           $CompleteFile->complete_id=$completeAssingment->id;
           $CompleteFile->save();
         }


      }
       session()->flash('success', 'Assingment Deliver Successfully');
      return redirect('writer/dashboard');

}


}
