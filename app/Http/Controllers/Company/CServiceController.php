<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\CompanyHasServiceMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CServiceController extends Controller
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
            $company = CompanyMdl::where('user_id', Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        //company activity services
        try {
            $activityServices
                = DB::table('activity_has-services')->select('service_id')->where('activity_id', $company->activity_id)->get()->pluck('service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $services = ServiceMdl::select('id','name_en','name_ar')->where('status', 1)->whereIn('id', $activityServices)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companyServices = CompanyHasServiceMdl::select('service_id')->where('company_id', $company->id)->get()->pluck('service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        return view('company.service.index', compact('company', 'services', 'companyServices'));
    }
    /*
    *====================================
    * UPDATE
    *====================================
    */
    public function update(Request $req){
        $valid = Validator::make($req->all(),[
            'company'=>'required|numeric|exists:companies,id',
            'service'=>'required',
        ],[
            'company.required' =>__('admin.Field Is Required.'),
            'company.numeric'  =>__('admin.Format Not Matching.'),
            'company.exists'   =>__('admin.This Value Is Already Exists.'),

            'service.required' =>__('admin.Field Is Required.'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $company = CompanyMdl::findOrFail($req->company);
        } catch (\Throwable $th) {
            return 404;
        }

        $company->services_company()->sync($req->service);

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return redirect()->route('home');
    }
    /*
    *====================================
    * PRICE LIST
    *====================================
    */
    public function prices(){
        try {
            $company  = CompanyMdl::where('user_id',Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $services = CompanyHasServiceMdl::where('company_id',$company->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            if (App::getLocale()=='ar') {
                $serviceNames =ServiceMdl::select('id','name_ar')->where('status',1)->get()->pluck('name_ar','id')->all();
            } else {
                $serviceNames =ServiceMdl::select('id','name_en')->where('status',1)->get()->pluck('name_en','id')->all();
            }
        } catch (\Throwable $th) {
            return 404;
        }

        return view('company.service.price', compact('company','services','serviceNames'));
    }
    /*
    *====================================
    * EDIT PRICE
    *====================================
    */
    public function edit($service){
        try {
            $servicePrice = CompanyHasServiceMdl::findOrFail($service);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $service = ServiceMdl::findOrFail($servicePrice->service_id);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $company = CompanyMdl::where('user_id',Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        return view('company.service.edit',compact('servicePrice','service','company'));
    }
    /*
    *====================================
    * UPDATE
    *====================================
    */
    public function updatePrice(Request $req){
        $valid = Validator::make($req->all(),[
            'service' =>'required|numeric|exists:companies_has_services,id',
            'price'   =>'required|numeric',
            'logo'    =>'nullable|image|mimes:png,jpg,jpeg',
        ],[
            'service.required' =>__('admin.Field Is Required.'),
            'service.numeric'  =>__('admin.Format Not Matching.'),
            'service.exists'   =>__('admin.This Value Is Already Exists.'),

            'price.required'   =>__('admin.Field Is Required.'),
            'price.numeric'    =>__('admin.Format Not Matching.'),

            'logo.image' =>__('admin.Format Not Matching.'),
            'logo.mimes' =>__('admin.File Not Allowed.'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $service = CompanyHasServiceMdl::findOrFail($req->service);
        } catch (\Throwable $th) {
            return 404;
        }

        if ($req->hasFile('logo')) {
            $img = $req->file('logo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/services'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STORAGE FILE
            $resize = Image::make("imgs/services/{$imgName}")->resize(300, 370)->encode('png');
            Storage::put("public/imgs/services/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/services/' . $imgName);
        } else {
            $imgName = null;
        }

        $service->price = $req->price;
        $service->photo = $imgName;
        $service->save();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    *
    *====================================
    */
}