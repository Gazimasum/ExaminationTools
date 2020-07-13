<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Page;
use App\Models\Payment_method;

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
      $page = Page::where('id',$id)->first();
      return view('backend.pages.contentpage.edit', compact('page'));
    }
    public function pageupdate(Request $r,$id)
    {
      $page = Page::where('id',$id)->first();
      $page->content = $r->content;
      $page->update();

      return view('backend.pages.contentpage.edit', compact('page'));
    }

    public function payment_method(){
      $payment_method = Payment_method::get();
      return view('backend.pages.payment-method.index',compact('payment_method'));
    }
    public function payment_method_edit($id){
      $payment_method = Payment_method::where('id',$id)->first();
      return view('backend.pages.payment-method.edit',compact('payment_method'));
    }
    public function payment_method_status($id){
      $payment_method = Payment_method::where('id',$id)->first();
      if ($payment_method->active==0) {
        $payment_method->active=1;
        $payment_method->update();

      }
      else {
        $payment_method->active=0;
        $payment_method->update();
      }
      session()->flash('success', 'Status Update');
      return back();
    }
    public function payment_method_update(Request $r,$id){
      $payment_method = Payment_method::where('id',$id)->first();
      $payment_method->name = $r->name;
      $payment_method->description = $r->description;
      $payment_method->active = $r->active;
      $payment_method->update();
        session()->flash('success', ' Update Successfully');
      return view('backend.pages.payment-method.edit',compact('payment_method'));
    }
}
