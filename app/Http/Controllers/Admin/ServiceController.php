<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /*
  *====================================
  * INDEX
  *====================================
  */
  public function index()
  {
    try {
      if (App::getLocale() == 'ar') {
        $services = ServiceMdl::orderBy('name_ar', 'asc')->paginate(pageCount);
      } else {
        $services = ServiceMdl::orderBy('name_en', 'asc')->paginate(pageCount);
      }
    } catch (\Throwable $th) {
      return 404;
    }

    $servicesCount = $services->count();

    return view('admin.service.index', compact('services','servicesCount'));
  }
  /*
  *====================================
  * STORE
  *====================================
  */
  public function store(Request $req){
    $valid = Validator::make($req->all(),[
      'nameAr' =>'required|string|unique:services,name_ar',
      'nameEn' =>'required|string|unique:services,name_en',
    ],[
      'nameAr.required' =>__('admin.Field Is Required.'),
      'nameAr.string' =>__('admin.Format Not Matching.'),
      'nameAr.unique' =>__('admin.This Value Is Already Exists.'),

      'nameEn.required' =>__('admin.Field Is Required.'),
      'nameEn.string' =>__('admin.Format Not Matching.'),
      'nameEn.unique' =>__('admin.This Value Is Already Exists.'),
    ]);

    if($valid->fails()){
      return back()->withErrors($valid)->withInput($req->all());
    }

    try {
      ServiceMdl::create([
        'name_en' =>Str::title($req->nameEn),
        'name_ar' =>$req->nameAr,
      ]);
    } catch (\Throwable $th) {
      return 404;
    }

    Alert::success(__('admin.Success'),__('admin.Record Added Successfully.'));
    return back();
  }
  /*
  *====================================
  * EDIT
  *====================================
  */
  public function edit($service){
    try {
      $service = ServiceMdl::findOrFail($service);
    } catch (\Throwable $th) {
      return 404;
    }

    return view('admin.service.edit', compact('service'));
  }
  /*
  *====================================
  * UPDATE
  *====================================
  */
  public function update(Request $req){
    $valid = Validator::make($req->all(),[
      'service' =>'required|numeric|exists:services,id',
      'nameAr' =>'required|string|unique:services,name_ar,'.$req->service,
      'nameEn' =>'required|string|unique:services,name_en,'.$req->service,
    ],[
      'nameAr.required' =>__('admin.Field Is Required.'),
      'nameAr.string' =>__('admin.Format Not Matching.'),
      'nameAr.unique' =>__('admin.This Value Is Already Exists.'),

      'nameEn.required' =>__('admin.Field Is Required.'),
      'nameEn.string' =>__('admin.Format Not Matching.'),
      'nameEn.unique' =>__('admin.This Value Is Already Exists.'),
    ]);

    if($valid->fails()){
      return back()->withErrors($valid)->withInput($req->all());
    }

    try {
      $service = ServiceMdl::findOrFail($req->service);
    } catch (\Throwable $th) {
      return 404;
    }

    $service->name_en = Str::title($req->nameEn);
    $service->name_ar = $req->nameAr;
    $service->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
  /*
  *====================================
  * ACTIVATE
  *====================================
  */
  public function activate($service){
    try {
        $service = ServiceMdl::findOrFail($service);
    } catch (\Throwable $th) {
        return 404;
    }

    $service->status =1;
    $service->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
  /*
  *====================================
  * DEACTIVATE
  *====================================
  */
  public function deactivate($service){
    try {
        $service = ServiceMdl::findOrFail($service);
    } catch (\Throwable $th) {
        return 404;
    }

    $service->status =0;
    $service->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
  /*
  *====================================
  * DESTROY
  *====================================
  */
  public function destroy(Request $req){
    $valid = Validator::make($req->all(),[
        'serviceID' =>'required|numeric|exists:services,id'
    ]);

    if($valid->fails()){
        Alert::error(__('admin.Error'), __('admin.We Cant Complete Your request now!'));
        return back();
    }

    try {
        $service = ServiceMdl::findOrFail($req->serviceID);
    } catch (\Throwable $th) {
        return 404;
    }

    $service->delete();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
  /*
  *====================================
  *
  *====================================
  */
}