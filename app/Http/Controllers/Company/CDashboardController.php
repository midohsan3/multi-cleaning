<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CompanyHasServiceMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\ActivityHasServiceMdl;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CDashboardController extends Controller
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

        if (empty(Auth::user()->profile_pic)) {
            return redirect()->route('company.logo.create');
        }
        try {
            $company = CompanyMdl::where('user_id', Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        if (empty($company->license)) {
            return redirect()->route('company.license.create');
        }

        try {
            $companyServices = CompanyHasServiceMdl::select('service_id')->where('company_id', $company->id)->get()->pluck('service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        if (empty($companyServices)) {
            return redirect()->route('company.service.index');
        }

        if ($company->status == 0) {
            return view('company.review');
        }

        try {
            $services = ServiceMdl::whereIn('id',$companyServices)->inRandomOrder()->limit(5)->get();
        } catch (\Throwable $th) {
             return 404;
        }

    return view('company.dashboard.admin', compact('company','services'));
    }
    /*
    *====================================
    * LOGO CREATE
    *====================================
    */
    public function createLogo(){
        return view('company.completeProfile.logo');
    }
    /*
    *====================================
    *LOGO STORE
    *====================================
    */
    public function storeLogo(Request $req){
        $valid = Validator::make($req->all(),[
            'logo' =>'required|image|mimes:png,jpg,jpeg',
        ],[
            'logo.required' =>__('admin.Field Is Required.'),
            'logo.image' =>__('admin.Format Not Matching.'),
            'logo.mimes' =>__('admin.File Not Allowed.'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->hasFile('logo')) {
            $img = $req->file('logo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/users'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STORAGE FILE
            $resize = Image::make("imgs/users/{$imgName}")->resize(300, 370)->encode('png');
            Storage::put("public/imgs/users/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/users/' . $imgName);
        } else {
            $imgName = null;
        }

        try {
            $user = User::findOrFail(Auth::user()->id);
        } catch (\Throwable $th) {
            return 404;
        }

        $user->profile_pic = $imgName;
        $user->save();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));

        return redirect()->route('home');
    }
    /*
    *====================================
    *LICENSE CREATE
    *====================================
    */
    public function createLicense(){
        return view('company.completeProfile.license');
    }
    /*
    *====================================
    * STORE LICENSE
    *====================================
    */
    public function storeLicense(Request $req){
        $valid = Validator::make($req->all(),[
            'license' =>'required|mimes:pdf'
        ],[
            'license.required' =>__('admin.Field Is Required.'),
            'license.mimes'    =>__('admin.File Not Allowed.'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $company = CompanyMdl::where('user_id',Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        if ($req->hasFile('license')) {
            $img = $req->file('license');
            $licenseName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/license'), $licenseName);
        } else {
        $licenseName = null;
        }

        try {
            $company->license = $licenseName;
            $company->save();
        } catch (\Throwable $th) {
            return 404;
        }

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));

        return redirect()->route('home');
    }
    /*
    *====================================
    * EDIT ABOUT
    *====================================
    */
    public function bioEdit(){
        try {
            if (Auth::user()->role_name=='Company') {
                $company = CompanyMdl::where('user_id',Auth::user()->id)->first();
            }
        } catch (\Throwable $th) {
            return 404;
        }

        return view('company.completeProfile.bio',compact('company'));
    }
    /*
    *====================================
    * UPDATE BIO
    *====================================
    */
    public function bioUpdate(Request $req){
        $valid = Validator::make($req->all(),[
            'nameAr' =>'nullable|string',
            'nameEn' =>'nullable|string',
        ],[
            'nameAr.string' =>__('admin.Format Not Matching.'),
            'nameEn.string' =>__('admin.Format Not Matching.'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $company = CompanyMdl::where('user_id',Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        $company->about_en = $req->nameEn;
        $company->about_ar = $req->nameAr;
        $company->save();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    *
    *====================================
    */
}
