<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Page;

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

    public function pagesContent()
    {
      $pages = Page::get();
      return view('backend.pages.contentpage.index', compact('pages'));
    }
    public function pagesContentShow($id)
    {
      $page = Page::find($id)->first();
      return view('backend.pages.contentpage.edit', compact('page'));
    }
    public function pageupdate(Request $r,$id)
    {
      $page = Page::find($id)->first();
      $page->content = $r->content;
      $page->update();

      return view('backend.pages.contentpage.edit', compact('page'));
    }
}
