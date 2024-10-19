<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CompanyHasServiceMdl;
use Illuminate\Support\Facades\Auth;

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
    *
    *====================================
    */
}
