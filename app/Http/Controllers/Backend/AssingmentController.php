<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Assingment;
use App\Models\AssingmentImage;
use App\Models\AssingmentFile;
use App\Models\CompleteAssingment;
use Auth;
use File;

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
  public function complete()
  {
    $order = Order::where('status',3)->get();
    return view('backend.pages.assingment.complete',compact('order'));
  }
  public function edit($id)
  {
    $assingment = Assingment::where('id',$id)->first();
    return view('backend.pages.assingment.edit',compact('assingment'));
  } 
   public function update(Request $request,$id)
  {
    $assingment = Assingment::where('id',$id)->first();
    $assingment->assingment_name = $request->name;
    $assingment->assingment_details = $request->assingment_details;
    $assingment->update();
    session()->flash('success', 'Update successfully');
    return back();
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

  public function imagechage(Request $request,$id)
  {
    if ($request->hasfile('image')) {
      $oldimage = AssingmentImage::where('id',$id)->first();

     if(File::exists('files/images/'.$oldimage->image)){
            File::delete('files/images/'.$oldimage->image);
          }
           $newimage = $request->file('image');
            $name=time().".".$newimage->getClientOriginalName();
           $newimage->move(public_path().'/files/images/', $name);
           
           $oldimage->image=$name;
           
           $oldimage->update();    
            session()->flash('success', 'Image Change successfully');
            return back();
    }

  }
  public function filechange(Request $request,$id)
  {
    if ($request->hasfile('file')) {
      $oldfile = Assingmentfile::where('id',$id)->first();

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

  public function handOver($id,$std_id)
  {
    $completeAssingment = CompleteAssingment::where('id',$id)->first();
    $completeAssingment->student_id = $std_id;
    $completeAssingment->update();
     session()->flash('success', 'HandOver successfully');
    return redirect('/admin');
  }

}
