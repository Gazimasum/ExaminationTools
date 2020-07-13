<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $currency = Currency::get();
    return view('backend.pages.currency.index',compact('currency'));
  }
  public function create()
  {

    return view('backend.pages.currency.create');
  }


  public function edit($id)
  {
      $currency = Currency::where('id',$id)->first();
      return view('backend.pages.currency.edit',compact('currency'));
  }
  public function store(Request $request)
  {
      $currency = new Currency();
      $currency->name = $request->name;
      $currency->code = $request->code;
      $currency->html_entity = $request->html_entity;
      $currency->font_arial = $request->font_arial;
      
      $currency->save();
      session()->flash('success', 'Store Successfully');
      return back();
  }
  public function update(Request $request,$id)
  {
      $currency = Currency::where('id',$id)->first();
      $currency->name = $request->name;
      $currency->code = $request->code;
      $currency->html_entity = $request->html_entity;
      $currency->font_arial = $request->font_arial;
      $currency->update();
      session()->flash('success', 'Update Successfully');
      return back();
  }
  public function delete($id)
  {
      $currency = Currency::where('id',$id)->first();
      $currency->delete();
      session()->flash('success', 'Delete Successfully');
      return back();
  }

   public function getID($id)
  {
    
     return json_encode(Currency::where('id',$id)->first());
  }
}
