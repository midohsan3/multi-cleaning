<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\OrderMdl;
use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        //STOP TEMPORALLY UNTIL WE GET MORE COMPANIES
        /*
        if (empty($company->license)) {
            return redirect()->route('company.license.create');
        }
        */

        try {
            $companyServices = CompanyHasServiceMdl::where('company_id', $company->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        if (empty($companyServices)) {
            return redirect()->route('company.service.index');
        }

        if ($companyServices->count()>0) {
            foreach ($companyServices as $key => $service) {
                if($service->price==0)
                return redirect()->route('company.service.prices.edit',$service->service_id);
            }
        }

        if ($company->status == 0) {
            return view('company.review');
        }

        try {
            $orders = OrderMdl::where('company_id',Auth::user()->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $ordersCount = $orders->count();
            $ordersTotal = $orders->sum('total');
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $thisMonthOrders = OrderMdl::where('company_id',Auth::user()->id)->whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $thisWeekOrders = OrderMdl::where('company_id',Auth::user()->id)->whereBetween('created_at',[Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()])->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $thisMonthOrdersCount = $thisMonthOrders->count();
            $thisMonthOrdersTotal = $thisMonthOrders->sum('total');
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $thisWeekOrdersCount = $thisWeekOrders->count();
            $thisWeekOrdersTotal = $thisWeekOrders->sum('total');
        } catch (\Throwable $th) {
            return 404;
        }

        try {
        $servicesIds = $companyServices->pluck('service_id')->all();
        } catch (\Throwable $th) {
        return 404;
        }

        try {
            $services = ServiceMdl::whereIn('id',$servicesIds)->inRandomOrder()->limit(5)->get();
        } catch (\Throwable $th) {
             return 404;
        }

        try {
            $servicesPrice = $companyServices->pluck('price','service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

    return view('company.dashboard.admin',
    compact('company','ordersCount','ordersTotal','thisMonthOrdersCount','thisMonthOrdersTotal','thisWeekOrdersCount','thisWeekOrdersTotal','services','servicesPrice'));
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

        try {
            $company->about_en = $req->nameEn;
            $company->about_ar = $req->nameAr;
            $company->save();
        } catch (\Throwable $th) {
            return 404;
        }

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    *
    *====================================
    */
}
