<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
/*
*====================================
* INDEX
*====================================
*/
    public function index(): View{
    try {
        $permissions = Permission::orderBy('name','asc')->paginate(pageCount);
    } catch (\Throwable $th) {
        return 404;
    }
    $permissionsCount = $permissions->count();

    return view('admin.roles.permission.index', compact('permissions','permissionsCount'));
    }
/*
*====================================
* STORE
*====================================
*/
    public function store(Request $req){
        $valid = Validator::make($req->all(),[
            'nameEn' =>'required|string|unique:permissions,name'
        ]);

        if($valid->fails()){
            Alert::error(__('admin.Error'),__('admin.We Cant Complete Your request now!'));

            return back()->withInput($req->all());
        }

        try {
            Permission::create([
                'name'=> $req->nameEn,
            ]);
        } catch (\Throwable $th) {
            return 404;
        }

        Alert::success(__('admin.Success'),__('admin.Record Added Successfully.'));
        return back();
    }
/*
*====================================
*
*====================================
*/
}
