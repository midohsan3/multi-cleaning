<?php

namespace App\Http\Controllers\Company;

use App\Models\CompanyMdl;
use App\Models\ServiceMdl;
use Illuminate\Http\Request;
use App\Models\CompanyGalleryMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\CompanyHasServiceMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CCompanyGalleryController extends Controller
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
            $companyServices = CompanyHasServiceMdl::where('company_id',$company->id)->get()->pluck('service_id');
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            if (App::getLocale()=='ar') {
                $services = ServiceMdl::whereIn('id',$companyServices)->orderBy('name_ar','asc')->get();
            } else {
                $services = ServiceMdl::whereIn('id',$companyServices)->orderBy('name_ar','asc')->get();
            }

        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $gallery = CompanyGalleryMdl::where('company_id',$company->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }
        return view('company.gallery.index', compact('company','gallery','services'));
    }
    /*
    *====================================
    * STORE
    *====================================
    */
    public function store(Request $req){
        $valid = Validator::make($req->all(),[
            'company'=>'required|numeric|exists:companies,id',
            'service'=>'required|numeric|exists:services,id',
            'photo'  =>'required|image|mimes:jpg,png,jpeg',
        ],[
            'company.required' =>__('admin.Field Is Required.'),
            'company.numeric'  =>__('admin.Format Not Matching.'),
            'company.exists'   =>__('admin.This Value Is Not Exists.'),

            'service.required' =>__('admin.Field Is Required.'),
            'service.numeric'  =>__('admin.Format Not Matching.'),
            'service.exists'   =>__('admin.This Value Is Not Exists.'),

            'photo.required' =>__('admin.Field Is Required.'),
            'photo.image' =>__('admin.Format Not Matching.'),
            'photo.mimes' =>__('admin.File Not Allowed.'),
        ]);
         if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
         }

         if ($req->hasFile('photo')) {
            $img = $req->file('photo');
            $imgName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/companies'), $imgName);
            //RESIZING THE PICTURE AND MAKE A COPY WITH NEW SIZE IN STORAGE FILE
            $resize = Image::make("imgs/companies/{$imgName}")->resize(400, 300)->encode('png');
            Storage::put("public/imgs/companies/{$imgName}", $resize->__toString());
            //delete the file as a temp
            File::delete('imgs/companies/' . $imgName);
         } else {
            $imgName = null;
         }

         try {
            CompanyGalleryMdl::create([
                'company_id' =>$req->company,
                'service_id' =>$req->service,
                'photo'      =>$imgName,
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
    public function destroy($photo){
        try {
            $photo = CompanyGalleryMdl::findOrFail($photo);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            File:File::delete('storage/app/public/imgs/companies/' . $photo->photo);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $photo->forceDelete();
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