<?php

namespace App\Http\Controllers\Admin;

use App\Models\CountryMdl;
use App\Models\ActivityMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\CountryHasActivityMdl;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
   }

   /*
   *====================================
   * INDEX
   *====================================
   */
  public function index(){

    if(App::getLocale()=='ar'){
      $countries = CountryMdl::orderBy('name_ar','asc')->paginate(pageCount);
    }else{
      $countries = CountryMdl::orderBy('name_ar','asc')->paginate(pageCount);
    }

    $countriesCount = $countries->count();

    return view('admin.country.index', compact('countries', 'countriesCount'));
  }
   /*
   *====================================
   * STORE
   *====================================
   */
  public function store(Request $req){
    $valid = Validator::make($req->all(),[
      'nameAr'    =>'required|string|unique:countries,name_ar',
      'nameEn'    =>'required|string|unique:countries,name_en',
      'ariaCode'  =>'required|string|max:2',
      'phoneCode' =>'required|string|max:3',
      'currency'  =>'required|string|max:3',
    ],[
      'nameAr.required' =>__('admin.Field Is Required.'),
      'nameAr.string' =>__('admin.Format Not Matching.'),
      'nameAr.unique' =>__('admin.This Value Is Already Exists.'),

      'nameEn.required' =>__('admin.Field Is Required.'),
      'nameEn.string'   =>__('admin.Format Not Matching.'),
      'nameEn.unique'   =>__('admin.This Value Is Already Exists.'),

      'ariaCode.required' =>__('admin.Field Is Required.'),
      'ariaCode.string'   =>__('admin.Format Not Matching.'),
      'ariaCode.max'      =>__('admin.This Value Is Too Long'),

      'phoneCode.required' =>__('admin.Field Is Required.'),
      'phoneCode.string'   =>__('admin.Format Not Matching.'),
      'phoneCode.max'      =>__('admin.This Value Is Too Long'),

      'currency.required' =>__('admin.Field Is Required.'),
      'currency.string'   =>__('admin.Format Not Matching.'),
      'currency.max'      =>__('admin.This Value Is Too Long'),
    ]);

    if($valid->fails()){
      return back()->withErrors($valid)->withInput($req->all());
    }

    $country = CountryMdl::create([
      'name_en'       =>Str::title($req->nameEn),
      'name_ar'       =>$req->nameAr,
      'country_code'  =>$req->ariaCode,
      'phone_code'    =>$req->phoneCode,
      'currency_code' =>$req->currency,
    ]);

    Alert::success(__('admin.Success'),__('admin.Record Added Successfully.'));
    return back();
  }
   /*
   *====================================
   * EDIT
   *====================================
   */
  public function edit($country){
    $country = CountryMdl::findOrFail($country);
    return view('admin.country.edit', compact('country'));
  }
   /*
   *====================================
   * UPDATE
   *====================================
   */
  public function update(Request $req){
    $valid = Validator::make($req->all(),[
        'country'   =>'required|numeric|exists:countries,id',
        'nameAr'    =>'required|string|unique:countries,name_ar,'.$req->country.'',
        'nameEn'    =>'required|string|unique:countries,name_en,'.$req->country.'',
        'ariaCode'  =>'required|string|max:2',
        'phoneCode' =>'required|string|max:3',
        'currency'  =>'required|string|max:3',
    ],[
        'maneAR.required' =>__('admin.Field Is Required.'),
        'maneAR.string'   =>__('admin.Format Not Matching.'),
        'maneAR.unique'   =>__('admin.This Value Is Already Exists.'),

        'nameEn.required' =>__('admin.Field Is Required.'),
        'nameEn.string'   =>__('admin.Format Not Matching.'),
        'nameEn.unique'   =>__('admin.This Value Is Already Exists.'),

        'ariaCode.required' =>__('admin.Field Is Required.'),
        'ariaCode.string'   =>__('admin.Format Not Matching.'),
        'ariaCode.max'      =>__('admin.This Value Is Too Long'),

        'phoneCode.required' =>__('admin.Field Is Required.'),
        'phoneCode.string'  =>__('admin.Format Not Matching.'),
        'phoneCode.max'    =>__('admin.This Value Is Too Long'),

        'currency.required' =>__('admin.Field Is Required.'),
        'currency.string'  =>__('admin.Format Not Matching.'),
        'currency.max'    =>__('admin.This Value Is Too Long'),
    ]);

    if($valid->fails()){
        return back()->withErrors($valid)->withInput($req->all());
    }

    try {
        $country = CountryMdl::findOrFail($req->country);
    } catch (\Throwable $th) {
        return 404;
    }

    $country->name_ar       = $req->nameAr;
    $country->name_en       = Str::title($req->nameEn);
    $country->country_code  = $req->ariaCode;
    $country->phone_code    = $req->phoneCode;
    $country->currency_code = $req->currency;
    $country->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));

    return back();

  }
   /*
   *====================================
   * ACTIVITIES
   *====================================
   */
  public function activities($country){
    try {
        $country = CountryMdl::findOrFail($country);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $activities = ActivityMdl::where('status',1)->orderBy('id','desc')->get();
    } catch (\Throwable $th) {
        return 404;
    }

    try {
       $countryActivities = DB::table('countries_has_activities')->where('country_id',$country->id)->get()->pluck('country_id','activity_id')->all();
    } catch (\Throwable $th) {
        return 404;
    }

    return view('admin.country.activity', compact('country','activities','countryActivities'));
  }

   /*
   *====================================
   * ACTIVATE
   *====================================
   */
  public function activitiesUpdate(Request $req){
    $valid = Validator::make($req->all(),[
        'country'  => 'required|numeric|exists:countries,id',
        'activity' => 'required',
    ],[
        'activity.required' =>__('admin.Field Is Required.'),
    ]);

    if($valid->fails()){
        return back()->withErrors($valid)->withInput($req->all());
    }

    try {
        $country = CountryMdl::findOrFail($req->country);
    } catch (\Throwable $th) {
        return 404;
    }

    $country->activities_country()->sync($req->activity);

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
   /*
   *====================================
   * ACTIVATE
   *====================================
   */
  public function activate($country){
    try {
        $country = CountryMdl::findOrFail($country);
    } catch (\Throwable $th) {
        return 404;
    }

    $country->status = 1;
    $country->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
   /*
   *====================================
   * DEACTIVATE
   *====================================
   */
  public function deactivate($country){
    try {
        $country = CountryMdl::findOrFail($country);
    } catch (\Throwable $th) {
        return 404;
    }

    $country->status = 0;
    $country->save();

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
        'countryID'=>'required|numeric|exists:countries,id'
    ]);

    if($valid->fails()){
        Alert::error(__('admin.Success'),__('admin.We Cant Complete Your request now!'));
        return back();
    }

    try {
        $country = CountryMdl::findOrFail($req->countryID);
    } catch (\Throwable $th) {
        return 404;
    }

    $country->delete();

    Alert::success(__('admin.Success'),__('admin.Record Deleted Successfully.'));
    return back();
  }
   /*
   *====================================
   *
   *====================================
   */
}