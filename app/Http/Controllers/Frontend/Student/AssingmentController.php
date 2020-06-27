<?php

namespace App\Http\Controllers\Frontend\Student;
use App\Http\Controllers\Controller;
use App\Notifications\AssingmentRequest;
use App\Models\Assingment;
use App\Models\Admin;
use App\Models\Order;
use App\Models\AssingmentImage;
use App\Models\AssingmentFile;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Auth;
use Image;
use File;

class AssingmentController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:web');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

      $this->validate($request,
         ['name' => 'required',
         'assingmenttype' => 'required',
         'education_level' => 'required',
         'subject'=>'required',
         'details' =>'required',
         'deadline_date'      => 'required|date|date_format:Y-m-d|after:yesterday',
         // 'images[]' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
         // 'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         // 'files' => 'max:2048|mimes:pdf,docx,doc',
       ],
       [
       'name.required'=>"Please Provide a Name.",
       // 'vehicleoverview.max'=>"Please Provide maximum 500 word.",
     ]);
    //  if($request->hasfile('images'))
    // {
    //  foreach ($request->file('images') as $image)
    //     {
    //         $this->validate($request,[
    //         'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);
    //   }
    // }

     $student = Auth::user();
     $a = new Assingment();
     $a->assingment_name = $request->name;
     $a->student_id =$student->id;
     $a->assingment_type_id = $request->assingmenttype;
     $a->education_level_id = $request->education_level;
     $a->assingment_subject_id = $request->subject;
     $a->assingment_details = $request->details;
     $a->deadline_date = $request->deadline_date;
     $a->remember_token = Str::random(40);
     $a->save();

     if($request->hasfile('images'))
      {
         foreach($request->file('images') as $image)
         {

           $name=time().".".$image->getClientOriginalName();
           $image->move(public_path().'/files/images/', $name);
           $a_image= new AssingmentImage();
           $a_image->image=$name;
           $a_image->assingment_id=$a->id;
           $a_image->save();
         }
      }
     if($request->hasfile('files'))
      {
         foreach($request->file('files') as $files)
         {
           $name=time().".".$files->getClientOriginalName();
           $files->move(public_path().'/files/others/', $name);
           $a_image= new AssingmentFile();
           $a_image->file=$name;
           $a_image->assingment_id=$a->id;
           $a_image->save();
         }


      }

      $order = new Order();
      $str = chr(rand(65,90));
      $digit = rand(10,100);
      $order->order_track_id = '#'.$str.$digit.$a->id;
      $order->assingments_id = $a->id;
      $order->student_id = $student->id;
      $order->save();

      $admin = Admin::get();
      foreach ($admin as $a) {
        $a->notify(new AssingmentRequest);
      }
      Toastr::success('Request Sent successfully', 'Title', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
      session()->flash('success', 'Request Sent successfully');
      return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assingment  $assingment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assingment = Assingment::where('id',$id)->first();
        if ($assingment!=null) {
          // Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-right","closeButton"=> true,"progressBar"=> true,]);
         return view('frontend.pages.student.assingmentView',compact('assingment'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assingment  $assingment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assingment $assingment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assingment  $assingment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assingment $assingment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assingment  $assingment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assingment $assingment)
    {
        //
    }
}
