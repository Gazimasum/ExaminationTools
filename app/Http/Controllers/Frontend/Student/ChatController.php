<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use App\Models\Chat;

class ChatController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:web');
  }

  public function messageview(){

    $student = Auth::user();
    $allow = Chat::where('user_id',$student->id)->first();
    if (!empty($allow)) {
      $chat = Chat::where('user_id',$student->id)->get();
      foreach ($chat as $c) {
        $c->is_user_seen = 0;
      $c->update();

      }
      return view('frontend.pages.student.message',compact('student','chat'));
    }
    else {
      Toastr::error('You cant send a message untill admin send a message to you', 'Error', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);

      // session()->flash('sticky_error', 'You cant send a message Untill admin send a message to you ');
        return back();
    }
  }

  public function messagesend(Request $r)
  {
    $id = Auth::id();
    $data = Chat::where('user_id',$id)->orderby('id','desc')->first();

    if ($data==null) {
      session()->flash('sticky_error', 'You cant send a message Untill admin send a message to you ');
        return back();
    }
    else {
      // $admin_id = $data->admin_id;
      // if ($data->reply==null) {
      //   if ($data->is_send_by!=Auth::id()) {
      //     $chat = Chat::orderby('id','desc')->first();
      //     $chat->reply = $r->message;
      //     $chat->update();
      //   }
      //   else {
          $chat = new Chat();
          $chat->user_id = $id;
          $chat->message = $r->message;
          $chat->admin_id = $admin_id;
          $chat->is_send_by = Auth::id();
          $chat->save();
        // }

      // }
      // else {
      //   $chat = new Chat();
      //   $chat->user_id = $id;
      //   $chat->message = $r->message;
      //   $chat->admin_id = $admin_id;
      //   $chat->is_send_by = Auth::id();
      //   $chat->save();
      // }

    }
    session()->flash('success', 'Message Send Successfully');
    Toastr::success('Message Send Successfully', 'Success', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);

      return back();
  }


  public function count()
  {
    $chat =  Chat::where('user_id',Auth::id())->where('is_user_seen',0)->count();
       return $chat;
  }

}
