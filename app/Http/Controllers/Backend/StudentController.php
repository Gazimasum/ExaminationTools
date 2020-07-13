<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Country;
use App\Models\Subject;
use App\Models\Chat;
use App\Models\EducationLevel;
use App\Models\StudentDetails;
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
    $student = User::where('id',$id)->first();
    if($student->status==0){
      $student->status = 1;
      $student->update();
      session()->flash('success', 'Status Change Successfully');
      return back();
    }
    else {
      $student->status = 0;
      $student->update();
      session()->flash('success', 'Status Change Successfully');
        return back();
    }
  }

  public function edit($id)
  {
      $country = Country::get();
      $student = User::where('id',$id)->first();
      return view('backend.pages.student.edit',compact('student','country'));
  }

  public function view($id)
  {
      $student = User::where('id',$id)->first();
      return view('backend.pages.student.view',compact('student'));
  }

  public function update(Request $request,$id)
  {
      $student = User::where('id',$id)->first();
      $student->name = $request->name;
      $student->phone_no = $request->phone_no;
      $student->email = $request->email;

      $student->status = $request->status;

      $student->update();

      $student_details = StudentDetails::where('student_id',$id)->first();
      $student_details->country_id = $request->country_id;
      $student_details->city = $request->city;
      $student_details->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $student = User::where('id',$id)->first();
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

      $data = Chat::where('user_id',$id)->orderBy('id','desc')->get();
      foreach ($data as $d) {
        $d->is_seen = 1;
      $d->update();

      }
      return view('backend.pages.messages.messageview',compact('data','id'));
  }
  public function messagesend(Request $r,$id)
  {

          $chat = new Chat();
          $chat->user_id = $id;
          $chat->message = $r->message;
          $chat->writer_id=null;
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
