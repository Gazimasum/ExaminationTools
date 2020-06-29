<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\WriterConfirm;
use App\Models\Freelancer;
use App\Models\WriterDetails;
use App\Models\Country;
use App\Models\Subject;
use App\Models\Chat;
use App\Models\EducationLevel;
use Auth;

class WriterController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $writer = Freelancer::where('status',1)->get();
    return view('backend.pages.writer.index',compact('writer'));
  }

  public function request()
  {
    $writer = Freelancer::where('status',0)->get();
    // $writer_details = WriterDetails::where('writer_id',$writer->id)->first();
    return view('backend.pages.writer.request',compact('writer'));
  }

  public function status($id)
  {
    $writer = Freelancer::findOrFail($id)->first();
    if($writer->status==0){
      $writer->status = 1;
      $writer->save();
      $writer->notify(new WriterConfirm);
      session()->flash('success', 'Status Change Successfully');
      return back();
    }
    else {
      $writer->status = 0;
      $writer->save();
      session()->flash('success', 'Status Change Successfully');
        return back();
    }
  }

  public function edit($id)
  {
      $country = Country::get();
      $writer = Freelancer::findOrFail($id)->first();
      return view('backend.pages.writer.edit',compact('writer','country'));
  }

  public function view($id)
  {
      $writer = Freelancer::findOrFail($id)->first();
      return view('backend.pages.writer.view',compact('writer'));
  }


  public function update(Request $request,$id)
  {
      $writer = Freelancer::findOrFail($id)->first();
      $writer->name = $request->name;
      $writer->email = $request->email;
      $writer->phone_no = $request->phone_no;
      $writer->status = $request->status;
      $writer->update();

      $writer_details = WriterDetails::where('writer_id',$id)->first();
      $writer_details->country_id = $request->country_id;
       $writer_details->city = $request->city;
       $writer_details->education_level = $request->education_level;
       if ($request->subjects!=$writer_details->subjects) {
         $writer_details->subjects = null;
         $writer_details->subjects =implode($request->subjects,',');
       }else {
       $writer_details->subjects = $request->subjects;
       }
       $writer_details->update();

      session()->flash('success', 'Profile Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $writer = Freelancer::findOrFail($id)->first();
      $writer->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }
  public function message()
  {
    $data = Freelancer::where('status',1)->get();
    return view('backend.pages.messages.home',compact('data'));
  }
  public function messageview($id)
  {

      $data = Chat::where('writer_id',$id)->get();
      foreach ($data as $d) {
        $d->is_seen = 1;
      $d->update();

      }

      return view('backend.pages.messages.messageview',compact('data','id'));
  }
  public function messagesend(Request $r,$id)
  {

      $chat = new Chat();
      $chat->writer_id = $id;
      $chat->message = $r->message;
      $chat->admin_id = Auth::id();
      $chat->is_send_by = Auth::id();
      $chat->save();

    session()->flash('success', 'Message Send Successfully');
      return back();
  }

  public function updateInbox(Request $request){
     $mId = $request->msgId;

     $update = DB::table('chat')
     ->where('id',$mId)
     ->update([
       'is_seen' => 0
     ]);
     if($update){
       echo "Status Update successfully";
     }
   }
}
