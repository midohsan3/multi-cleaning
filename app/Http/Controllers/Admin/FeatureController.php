<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FeatureController extends Controller
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
    try {
        $features = FeatureMdl::orderBy('id','DESC')->paginate(pageCount);
    } catch (\Throwable $th) {
        return 404;
    }


    $featuresCount = $features->count();

    return view('admin.package.feature.index', compact('features','featuresCount'));
  }
   /*
   *====================================
   * STORE
   *====================================
   */
  public function store(Request $req){
    $valid = Validator::make($req->all(),[
        'nameAr' =>'required|string|unique:features,name_ar',
        'nameEn' =>'required|string|unique:features,name_en',
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
        $feature = FeatureMdl::create([
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
  public function edit($feature){
    try {
        $feature = FeatureMdl::findOrFail($feature);
    } catch (\Throwable $th) {
        return 404;
    }

    return view('admin.package.feature.edit', compact('feature'));
  }
   /*
   *====================================
   * UPDATE
   *====================================
   */
  public function update(Request $req){
    $valid = Validator::make($req->all(),[
        'feature'=>'required|numeric|exists:features,id',
        'nameAr' =>'required|string|unique:features,name_ar,'.$req->feature,
        'nameEn' =>'required|string|unique:features,name_en,'.$req->feature,
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
        $feature = FeatureMdl::findOrFail($req->feature);
    } catch (\Throwable $th) {
        return 404;
    }

    $feature->name_en = $req->nameEn;
    $feature->name_ar = $req->nameAr;
    $feature->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
   /*
   *====================================
   * ACTIVATE
   *====================================
   */
  public function activate($feature){
    try {
        $feature = FeatureMdl::findOrFail($feature);
    } catch (\Throwable $th) {
        return 404;
    }

    $feature->status = 1;
    $feature->save();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
   /*
   *====================================
   * DEACTIVATE
   *====================================
   */
  public function deactivate($feature){
    try {
        $feature = FeatureMdl::findOrFail($feature);
    } catch (\Throwable $th) {
        return 404;
    }

    $feature->status = 0;
    $feature->save();

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
        'featureID' =>'required|numeric|exists:features,id'
    ]);

    if($valid->fails()){
        Alert::error(__('admin.Error'),__('admin.We Cant Complete Your request now!'));
        return back();
    }

    try {
        $feature = FeatureMdl::findOrFail($req->featureID);
    } catch (\Throwable $th) {
        return 404;
    }

    $feature->delete();

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
   /*
   *====================================
   *
   *====================================
   */
}
