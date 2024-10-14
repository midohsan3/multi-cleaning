<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NationalityMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class NationalityController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /*
    *====================================
    * INDEX
    *====================================
    */public function index(){
        try {
            if(App::getLocale()=='ar'){
                $nationalities = NationalityMdl::orderBy('name_ar','asc')->paginate(pageCount);
            }else{
                $nationalities = NationalityMdl::orderBy('name_en','asc')->paginate(pageCount);
            }
        } catch (\Throwable $th) {
            return 404;
        }

        $nationalitiesCount = $nationalities->count();

        return view('admin.nationality.index', compact('nationalities','nationalitiesCount'));
    }
    /*
    *====================================
    * STORE
    *====================================
    */
    public function store(Request $req){
        $valid = Validator::make($req->all(),[
            'nameAr' =>'required|string|unique:nationalities,name_ar',
            'nameEn' =>'required|string|unique:nationalities,name_en',
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
            NationalityMdl::create([
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
    public function edit($nationality){
        try {
            $nationality = NationalityMdl::findOrFail($nationality);
        } catch (\Throwable $th) {
            return 404;
        }

        return view('admin.nationality.edit', compact('nationality'));
    }
    /*
    *====================================
    * UPDATE
    *====================================
    */
    public function update(Request $req){
        $valid = Validator::make($req->all(),[
            'nationality' =>'required|numeric|exists:nationalities,id',
            'nameAr' =>'required|string|unique:nationalities,name_ar,'.$req->nationality,
            'nameEn' =>'required|string|unique:nationalities,name_en,'.$req->nationality,
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
            $nationality = NationalityMdl::findOrFail($req->nationality);
        } catch (\Throwable $th) {
            return 404;
        }

        $nationality->name_en = Str::title($req->nameEn);
        $nationality->name_ar = $req->nameAr;
        $nationality->save();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    * ACTIVATE
    *====================================
    */
    public function activate($nationality){
        try {
            $nationality = NationalityMdl::findOrFail($nationality);
        } catch (\Throwable $th) {
            return 404;
        }

        $nationality->status = 1;
        $nationality->save();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    * DEACTIVATE
    *====================================
    */
    public function deactivate($nationality){
        try {
            $nationality = NationalityMdl::findOrFail($nationality);
        } catch (\Throwable $th) {
            return 404;
        }

        $nationality->status = 0;
        $nationality->save();

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
            'nationalityID' =>'required|numeric|exists:nationalities,id'
        ]);

        if($valid->fails()){
            Alert::error(__('admin.Error'),__('admin.We Cant Complete Your request now!'));
            return back();
        }

        try {
            $nationality= NationalityMdl::findOrFail($req->nationalityID);

        } catch (\Throwable $th) {
            return 404;
        }

        $nationality->delete();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    *
    *====================================
    */
}