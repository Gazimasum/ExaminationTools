<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index(){
    $admin = Auth::user();
    return view('backend.pages.index', compact('admin'));

  }
  public function chat()
  {
    return view('backend.pages.messages.home');
  }

  public function allmessage()
    {
        return view('backend.pages.messages.allmessage');
    }
    function jsonResponse(){
        $user = DB::table('chats')->get();
        return response()->json($user);
    }
}
