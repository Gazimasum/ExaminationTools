<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Freelancer;
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
    return view('backend.pages.writer.request',compact('writer'));
  }

  public function status($id)
  {
    $writer = Freelancer::find($id)->first();
    if($writer->status==0){
      $writer->status = 1;
      $writer->save();
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
      $subject = Subject::get();
      $education_level = EducationLevel::get();
      $writer = Freelancer::find($id)->first();
      return view('backend.pages.writer.edit',compact('writer','country','subject','education_level'));
  }
  public function update(Request $request,$id)
  {
      $writer = Freelancer::find($id)->first();
      $writer->name = $request->name;
      $writer->phone_no = $request->phone_no;
      $writer->email = $request->email;
      $writer->country_id = $request->country_id;
      $writer->city = $request->city;
      $writer->education_level = $request->education_level;
      if ($request->subjects!=$writer->subjects) {
        $writer->subjects = null;
        $writer->subjects =implode($request->subjects,',');
      }else {
      $writer->subjects = $request->subjects;
      }

      $writer->status = $request->status;

      $writer->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $writer = Freelancer::find($id)->first();
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
        $d->is_seen = 0;
      $d->update();
      
      }

      return view('backend.pages.messages.messageview',compact('data','id'));
  }
  public function messagesend(Request $r,$id)
  {
    $data = Chat::where('writer_id',$id)->orderby('id','desc')->first();

    if ($data==null) {
      $chat = new Chat();
      $chat->writer_id = $id;
      $chat->message = $r->message;
      $chat->admin_id = Auth::id();
      $chat->is_send_by = Auth::id();
      $chat->save();
    }
    else {
      if ($data->reply==null) {
        if ($data->is_send_by!=Auth::id()) {
          $chat = Chat::orderby('id','desc')->first();
          $chat->reply = $r->message;
          $chat->update();
        }
        else {
          $chat = new Chat();
          $chat->writer_id = $id;
          $chat->message = $r->message;
          $chat->admin_id = Auth::id();
          $chat->is_send_by = Auth::id();
          $chat->save();
        }

      }
      else {
        $chat = new Chat();
        $chat->writer_id = $id;
        $chat->message = $r->message;
        $chat->admin_id = Auth::id();
        $chat->is_send_by = Auth::id();
        $chat->save();
      }

    }
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
