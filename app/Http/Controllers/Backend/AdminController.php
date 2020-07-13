<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
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
    public function index()
    {
      return view('backend.pages.admin.index');
    }
    public function profilechange()
    {
      return view('backend.pages.admin.edit');
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->validate($request,
         ['name' => 'string|max:255',
         'email' => 'email|unique:admins',
         'password' => 'confirmed|min:6',

       ]);
        $admin = Auth::user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->update();
        session()->flash('success', 'Update Successfully');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $admin = Admin::where('id',$id)->first();
        if ($admin->status==0) {
          $admin->status=1;
          $admin->update();
        }
        else {
          $admin->status=0;
          $admin->update();
        }

        session()->flash('success', 'Update Successfully');
        return redirect('/admin');
    }
    public function delete($id)
    {
        $admin = Admin::where('id',$id)->first();
        $admin->delete();
        session()->flash('success', 'Deleted Successfully');
        return redirect('/admin');
    }

    public function view()
    {
      $admin = Admin::get();
      return view('backend.pages.admin.alladmin',compact('admin'));
    }
}
