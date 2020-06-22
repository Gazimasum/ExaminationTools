<?php

namespace App\Http\Controllers\Frontend\Writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Chat;

class PagesController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:writer');
    }

    public function index(){
      $writer = Auth::user();
      return view('frontend.pages.writer.index', compact('writer'));

    }
    public function dashboard(){
      $writer = Auth::user();
      return view('frontend.pages.writer.dashboard', compact('writer'));

    }


}
