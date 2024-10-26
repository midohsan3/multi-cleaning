<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyConnectionMdl;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CSocialController extends Controller
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
            $company = CompanyMdl::where('user_id',Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $connections = CompanyConnectionMdl::where('company_id',$company->id)->orderBy('channel','asc')->get();
        } catch (\Throwable $th) {
            return 404;
        }

        $connectionsCount = $connections->count();

        return view('company.connections.index', compact('company','connections','connectionsCount'));
    }
    /*
    *====================================
    * STORE
    *====================================
    */
    public function store(Request $req){
        $valid = Validator::make($req->all(),[
            'company'  =>'required|numeric|exists:companies,id',
            'con_type' =>'required|numeric',
            'chanel'   =>'required|string',
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
            CompanyConnectionMdl::create([
                'company_id' =>$company->id,
                'channel'    =>$req->con_type,
                'info'       =>$req->chanel,
            ]);
        } catch (\Throwable $th) {
            return 404;
        }

         Alert::success(__('admin.Success'),__('admin.Record Added Successfully.'));
         return back();
    }
    /*
    *====================================
    * DESTROY
    *====================================
    */
    public function destroy(Request $req){
        $valid = Validator::make($req->all(),[
            'connID' =>'required|numeric|exists:company_connections,id'
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $conn = CompanyConnectionMdl::findOrFail($req->connID);
        } catch (\Throwable $th) {
            return 404;
        }

        $conn->forceDelete();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    *
    *====================================
    */
}