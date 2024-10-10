<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeatureMdl;
use App\Models\PackageMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PackageHasFeatureMdl;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
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
      $packages = PackageMdl::orderBy('price','asc')->paginate(pageCount);
    } catch (\Throwable $th) {
      return 404;
    }

    $packagesCount = $packages->count();

    return view('admin.package.index', compact('packages','packagesCount'));
  }
  /*
     *====================================
     * CREATE
     *====================================
  */
  public function create(){
    try {
      $features = FeatureMdl::where('status',1)->orderBy('id','desc')->get();
    } catch (\Throwable $th) {
      return 404;
    }

    return view('admin.package.create', compact('features'));
  }
  /*
     *====================================
     * STORE
     *====================================
  */
  public function store(Request $req){
    $valid = Validator::make($req->all(),[
      'nameAr'  =>'required|string|unique:packages,name_ar',
      'nameEn'  =>'required|string|unique:packages,name_en',
      'feature' =>'required',
    ],[
      'nameAr.required' =>__('admin.Field Is Required.'),
      'nameAr.string'   =>__('admin.Format Not Matching.'),
      'nameAr.unique'   =>__('admin.This Value Is Already Exists.'),

      'nameEn.required' =>__('admin.Field Is Required.'),
      'nameEn.string'   =>__('admin.Format Not Matching.'),
      'nameEn.unique'   =>__('admin.This Value Is Already Exists.'),

      'feature.required' =>__('admin.Field Is Required.'),
    ]);

    if($valid->fails()){
      return back()->withErrors($valid)->withInput($req->all());
    }

    try {
      $package = PackageMdl::create([
        'name_ar'=>$req->nameAr,
        'name_en'=>$req->nameEn,
      ]);
    } catch (\Throwable $th) {
      return 404;
    }

    try {
      $package->features_package()->sync($req->feature);
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
  public function edit($package){
    try {
      $package = PackageMdl::findOrFail($package);
    } catch (\Throwable $th) {
      return 404;
    }

    try {
      $features = FeatureMdl::where('status',1)->orderBy('id','desc')->get();
    } catch (\Throwable $th) {
      return 404;
    }

    try {
       $packageFeatures =
       DB::table('package_has_features')->where('package_id',$package->id)->get()->pluck('package_id','feature_id')->all();
    } catch (\Throwable $th) {
      return 404;
    }

    return view('admin.package.edit', compact('package','features','packageFeatures'));
  }
  /*
     *====================================
     * UPDATE
     *====================================
  */
  public function update(Request $req){
    $valid = Validator::make($req->all(),[
      'package'=>'required|numeric|exists:packages,id',
      'nameAr' =>'required|string|unique:packages,name_ar,'.$req->package,
      'nameEn' =>'required|string|unique:packages,name_en,'.$req->package,
      'feature' =>'required',
    ],[
      'nameAr.required' =>__('admin.Field Is Required.'),
      'nameAr.string' =>__('admin.Format Not Matching.'),
      'nameAr.unique' =>__('admin.This Value Is Already Exists.'),

      'nameEn.required' =>__('admin.Field Is Required.'),
      'nameEn.string' =>__('admin.Format Not Matching.'),
      'nameEn.unique' =>__('admin.This Value Is Already Exists.'),

      'feature.required' =>__('admin.Field Is Required.'),
    ]);

    if($valid->fails()){
      return back()->withErrors($valid)->withInput($req->all());
    }

    try {
      $package = PackageMdl::findOrFail($req->package);
    } catch (\Throwable $th) {
      return 404;
    }

    $package->name_en = $req->nameEn;
    $package->name_ar = $req->nameAr;
    $package->save();

    $package->features_package()->sync($req->feature);

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
  /*
     *====================================
     * ACTIVATE
     *====================================
  */
  public function activate($package){
    try {
      $package = PackageMdl::findOrFail($package);
    } catch (\Throwable $th) {
      return 404;
    }

    $package->status =1;
    $package->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
  /*
     *====================================
     * DEACTIVATE
     *====================================
  */
  public function deactivate($package){
    try {
      $package = PackageMdl::findOrFail($package);
    } catch (\Throwable $th) {
      return 404;
    }

    $package->status =01;
    $package->save();

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
      'packageID' =>'required|numeric|exists:packages,id'
    ]);

    if($valid->fails()){
      Alert::error(__('admin.Error'), __('admin.We Cant Complete Your request now!'));
      return back();
    }

    try {
      $package = PackageMdl::findOrFail($req->packageID);
    } catch (\Throwable $th) {
      return 404;
    }

    $package->delete();

    Alert::success(__('admin.Success'), __('admin.Record Updated Successfully.'));
    return back();
  }
  /*
     *====================================
     *
     *====================================
  */
}
