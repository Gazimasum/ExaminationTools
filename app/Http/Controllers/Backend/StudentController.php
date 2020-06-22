<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Country;
use App\Models\Subject;
use App\Models\Chat;
use App\Models\EducationLevel;
use Auth;

class StudentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $student = User::get();
    return view('backend.pages.student.index',compact('student'));
  }



  public function status($id)
  {
    $student = User::find($id)->first();
    if($student->status==0){
      $student->status = 1;
      $student->save();
      session()->flash('success', 'Status Change Successfully');
      return back();
    }
    else {
      $student->status = 0;
      $student->save();
      session()->flash('success', 'Status Change Successfully');
        return back();
    }
  }

  public function edit($id)
  {
      $country = Country::get();


      $student = User::find($id)->first();
      return view('backend.pages.student.edit',compact('student','country'));
  }
  public function update(Request $request,$id)
  {
      $student = User::find($id)->first();
      $student->name = $request->name;
      $student->phone_no = $request->phone_no;
      $student->email = $request->email;
      $student->country_id = $request->country_id;
      $student->city = $request->city;
      $student->status = $request->status;

      $student->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $student = User::find($id)->first();
      $student->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }
  public function message()
  {
    $data = User::where('status',1)->get();
    return view('backend.pages.messages.home',compact('data'));
  }
  public function messageview($id)
  {

      $data = Chat::where('user_id',$id)->get();
      foreach ($data as $d) {
        $d->is_seen = 0;
      $d->update();

      }
      return view('backend.pages.messages.messageview',compact('data','id'));
  }
  public function messagesend(Request $r,$id)
  {
    $data = Chat::where('user_id',$id)->orderby('id','desc')->first();

    if ($data==null) {
      $chat = new Chat();
      $chat->user_id = $id;
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
          $chat->user_id = $id;
          $chat->message = $r->message;
          $chat->admin_id = Auth::id();
          $chat->is_send_by = Auth::id();
          $chat->save();
        }

      }
      else {
        $chat = new Chat();
        $chat->user_id = $id;
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
