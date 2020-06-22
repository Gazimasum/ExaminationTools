<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Chat;
use Auth;

class Chat extends Model
{
  public static function newWriterMessage()
  {
    return Chat::count();
  }
  public static function newMessage()
  {

    // $chat = Chat::select(..)->whereNotIn('is_send_by',Auth::id())->orderby('id','desc')->count();
  $chat =  Chat::where('is_seen',1)->count();
     return $chat;
  }
  public static function newStudentMessage()
  {
    // $chat = Chat::select(..)->whereNotIn('is_send_by',Auth::id())->orderby('id','desc')->count();
  $chat =  Chat::where('is_seen',1)->count();
     return $chat;
  }
}
