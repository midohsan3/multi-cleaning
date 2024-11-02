<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use App\Models\CompanyMdl;
use App\Models\PackageMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\CompanyHasServiceMdl;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
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
        $companies = CompanyMdl::orderBy('id','desc')->paginate(pageCount);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
         $companiesServices = CompanyHasServiceMdl::select('company_id','service_id')->get()->countBy('company_id')->all();
    } catch (\Throwable $th) {
         return 404;
    }

    $companiesCount = $companies->count();

    return view('admin.company.index', compact('companies','companiesCount','companiesServices'));
  }
   /*
   *====================================
   * GET PACKAGE
   *====================================
   */
  public function getPackage($company){
    try {
        $company = CompanyMdl::findOrFail($company);
    } catch (\Throwable $th) {
        return 404;
    }
    try {
        $packages = PackageMdl::where('status',1)->get();
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $roles = Role::WhereNotIn('name',['Owner','Admin','Person'])->get();
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $companyRole = DB::table('model_has_roles')->select('model_id','role_id')->where('model_id',$company->user_id)->first();
    } catch (\Throwable $th) {
        return 404;
    }

    return view('admin.company.package',compact('company','packages','roles','companyRole'));
  }
   /*
   *====================================
   * STORE PACKAGE
   *====================================
   */
  public function storePackage(Request $req){
    $valid = Validator::make($req->all(),[
        'company' =>'required|numeric|exists:companies,id',
        'package' =>'required|numeric|exists:packages,id',
        'role'   =>'required|numeric|exists:roles,id',
    ],[
        'company.required'=>__('admin.Field Is Required.'),
        'company.numeric' =>__('admin.Format Not Matching.'),
        'company.exists'  =>__('admin.This Value Is Not Exists.'),

        'package.required'=>__('admin.Field Is Required.'),
        'package.numeric' =>__('admin.Format Not Matching.'),
        'package.exists'  =>__('admin.This Value Is Not Exists.'),

        'role.required'=>__('admin.Field Is Required.'),
        'role.numeric' =>__('admin.Format Not Matching.'),
        'role.exists'  =>__('admin.This Value Is Not Exists.'),
    ]);

    if($valid->fails()){
        return back()->withErrors($valid)->withInput($req->all());
    }

    try {
        $company = CompanyMdl::findOrFail($req->company);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $user = User::findOrFail($company->user_id);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $role = Role::findOrFail($req->role);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $company->package_id = $req->package;
        $company->save();
    } catch (\Throwable $th) {
        return 404;
    }

    try {
       DB::table('model_has_roles')->where('model_id',$user->id)->delete();
    } catch (\Throwable $th) {
         return 404;
    }

    try {
        $user->assignRole($role->name);
    } catch (\Throwable $th) {
        return 404;
    }

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
   /*
   *====================================
   * ACTIVATE
   *====================================
   */
  public function activate($company){
    try {
        $company = CompanyMdl::findOrFail($company);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $company->status =1;
        $company->save();
    } catch (\Throwable $th) {
        return 404;
    }

    Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
    return back();
  }
   /*
   *====================================
   * DEACTIVATE
   *====================================
   */
  public function deactivate($company){
    try {
        $company = CompanyMdl::findOrFail($company);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        $company->status =0;
        $company->save();
    } catch (\Throwable $th) {
        return 404;
    }

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
        'companyID' =>'required|numeric|exists:companies,id'
    ]);

    if($valid->fails()){
        Alert::error(__('admin.Error'),__('admin.We Cant Complete Your request now!'));
        return back()->withInput($req->all());
    }

    try {
        $company = CompanyMdl::findOrFail($req->companyID);
    } catch (\Throwable $th) {
        return 404;
    }

    try {
        User::findOrFail($company->user_id)->delete();
        $company->delete();
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
