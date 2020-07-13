<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Auth;

class MailboxCotroller extends Controller
{

	    public function __construct()
     {
       $this->middleware('auth:admin');
     }
    public function index()
    {
    	$mailbox = ContactMessage::get();
    	return view('backend.pages.mailbox.index',compact('mailbox'));
    }
}
