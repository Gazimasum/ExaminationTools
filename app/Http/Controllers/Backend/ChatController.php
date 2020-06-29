<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Auth;
class ChatController extends Controller
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
    public function studentmessageview($id)
    {

      $data = Chat::where('user_id',$id)->get();

        return view('backend.pages.messages.studentmessageview',compact('data'));
    }

    public function writermessageview($id)
    {

      $data = Chat::where('writer_id',$id)->orderby('id','desc')->get();

        return view('backend.pages.messages.writermessageview',compact('data'));
    }

    public function writerChatCount(){
      return Chat::where('is_seen',0)->where('user_id',null)->count();
    }
    public function studentChatCount(){
      return Chat::where('is_seen',0)->where('writer_id',null)->count();
    }
    public function ChatCount(){
      return Chat::where('is_seen',0)->count();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
