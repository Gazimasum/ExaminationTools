<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $country = Country::get();
    return view('backend.pages.country.index',compact('country'));
  }
  public function create()
  {

    return view('backend.pages.country.create');
  }


  public function edit($id)
  {
      $country = Country::where('id',$id)->first();
      return view('backend.pages.country.edit',compact('country'));
  }
  public function store(Request $request)
  {
      $country = new Country();
      $country->name = $request->name;
      $country->priority = $request->priority;
      $country->save();
      session()->flash('success', 'Store Successfully');
      return back();
  }
  public function update(Request $request,$id)
  {
      $country = Country::where('id',$id)->first();
      $country->name = $request->name;
      $country->priority = $request->priority;
      $country->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $country = Country::where('id',$id)->first();
      $country->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }
}
