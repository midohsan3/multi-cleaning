<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyServicesController extends Controller
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
    public function index($company){
        try {
            $company = CompanyMdl::findOrFail($company);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $activityServices = DB::table('activity_has-services')->select('service_id')->where('activity_id',$company->activity_id)->get()->pluck('service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companyServices = DB::table('companies_has_services')->where('company_id',$company->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $servicesIds = $companyServices->pluck('service_id')->all();
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            $services = ServiceMdl::whereIn('id',$activityServices)->get();
        } catch (\Throwable $th) {
            return 404;
        }
        return view('admin.company.services.index',compact('company','services','servicesIds'));
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
        ]);

        if($valid->fails()){
            Alert::error(__('admin.Error'),__('admin.We Cant Complete Your request now!'));
            return back()->withInput($req->all());
        }

        try {
            $company = CompanyMdl::findOrFail($req->company);
        } catch (\Throwable $th) {
            return 404;
        }

        $company->services_company()->sync($req->service);

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    *
    *====================================
    */
}
