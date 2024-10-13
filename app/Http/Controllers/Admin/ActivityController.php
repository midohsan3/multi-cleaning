<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\ActivityHasServiceMdl;
use App\Models\ServiceMdl;
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
      try {
        if(App::getLocale()=='ar'){
            $activities = ActivityMdl::orderBy('name_ar','desc')->paginate(pageCount);
        }else{
            $activities = ActivityMdl::orderBy('name_en','desc')->paginate(pageCount);
        }
      } catch (\Throwable $th) {
        return 404;
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
          'name_en'=>Str::title($req->nameEn),
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

      $activity->name_en = Str::title($req->nameEn);
      $activity->name_ar = $req->nameAr;
      $activity->save();

      Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
      return back();
    }
  /*
    *====================================
    * SERVICES
    *====================================
    */
    public function service($activity){
        try {
            $activity = ActivityMdl::findOrFail($activity);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            if(App::getLocale()=='ar'){
                $services = ServiceMdl::where('status',1)->orderBy('name_ar','asc')->get();
            }else{
                $services = ServiceMdl::where('status',1)->orderBy('name_en','asc')->get();
            }
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $activityServices =
            ActivityHasServiceMdl::where('activity_id',$activity->id)->get()->pluck('activity_id','service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        return view('admin.activity.service',compact('activity','services','activityServices'));
    }
  /*
    *====================================
    * SERVICES UPDATE
    *====================================
    */
    public function serviceUpdate(Request $req){
        $valid = Validator::make($req->all(),[
            'activity' =>'required|numeric|exists:activities,id',
            'service'  =>'required',
        ]);

        if($valid->fails()){
            Alert::error(__('admin.Error'), __('admin.We Cant Complete Your request now!'));
            return back();
        }

        try {
            $activity = ActivityMdl::findOrFail($req->activity);
        } catch (\Throwable $th) {
            return 404;
        }

        $activity->services_activity()->sync($req->service);

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