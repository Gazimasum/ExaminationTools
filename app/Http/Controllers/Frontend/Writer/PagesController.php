<?php

namespace App\Http\Controllers\Frontend\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:writer');
    }

    public function index(){
      $writter = Auth::user();
      return view('frontend.pages.writer.index', compact('writter'));

    }
    public function dashboard(){
      $writter = Auth::user();
      return view('frontend.pages.writer.dashboard', compact('writter'));

    }
}
