<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
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
    public function index(){
      if(App::getLocale()=='ar'){
        $activities = ActivityMdl::orderBy('name_ar','asc')->paginate(pageCount);
      }else{
        $activities = ActivityMdl::orderBy('name_en','asc')->paginate(pageCount);
      }

      $activitiesCount = $activities->count();
      return view('admin.activity.index', compact('activities','activitiesCount'));
    }
  /*
    *====================================
    * STORE
    *====================================
    */
    public function store(Request $req){
      $valid = Validator::make($req->all(),[
        'nameAr' =>'required|string|unique:activities,name_ar',
        'nameEn' =>'required|string|unique:activities,name_en',
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
        $activity = ActivityMdl::create([
          'name_en'=>$req->nameEn,
          'name_ar'=>$req->nameAr,
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
    public function edit($activity){
      try {
        $activity = ActivityMdl::findOrFail($activity);
      } catch (\Throwable $th) {
        return 404;
      }

      return view('admin.activity.edit', compact('activity'));
    }
  /*
    *====================================
    * UPDATE
    *====================================
    */
    public function update(Request $req){
      $valid = Validator::make($req->all(),[
        'activity'=>'required|numeric|exists:activities,id',
        'nameAr' =>'required|string|unique:activities,name_ar,'.$req->activity,
        'nameEn' =>'required|string|unique:activities,name_en,'.$req->activity,
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
        $activity = ActivityMdl::findOrFail($req->activity);
      } catch (\Throwable $th) {
        return 404;
      }

      $activity->name_en = $req->nameEn;
      $activity->name_ar = $req->nameAr;
      $activity->save();

      Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
      return back();
    }
  /*
    *====================================
    * ACTIVATE
    *====================================
    */
    public function activate($activity){
      try {
        $activity = ActivityMdl::findOrFail($activity);
      } catch (\Throwable $th) {
        return 404;
      }

      $activity->status = 1;
      $activity->save();

      Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
      return back();
    }
  /*
    *====================================
    * DEACTIVATE
    *====================================
    */
    public function deactivate($activity){
      try {
        $activity = ActivityMdl::findOrFail($activity);
      } catch (\Throwable $th) {
        return 404;
      }

      $activity->status = 0;
      $activity->save();

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
        'activityID'=>'required|numeric|exists:activities,id'
      ]);

      if($valid->fails()){
        Alert::error(__('admin.Error'),__('admin.We Cant Complete Your request now!'));
        return back();
      }

      try {
        $activity = ActivityMdl::findOrFail($req->activityID);
      } catch (\Throwable $th) {
        return 404;
      }

      $activity->delete();

      Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
      return back();
    }
  /*
    *====================================
    *
    *====================================
    */
}
