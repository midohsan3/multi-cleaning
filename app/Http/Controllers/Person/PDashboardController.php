<?php

namespace App\Http\Controllers\Person;

use App\Models\User;
use App\Models\PersonMdl;
use App\Models\CountryMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PDashboardController extends Controller
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
            return redirect()->route('person.profile.photo.create');
        }

        try {
            $person = PersonMdl::where('user_id',Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        if(empty($person->specialist)){
            return redirect()->route('person.profile.edit');
        }

        return view('person.dashboard.admin');
    }
    /*
    *====================================
    * PROFILE PHOTO
    *====================================
    */
    public function createLogo(){
        return view('person.profile.logo');
    }
    /*
    *====================================
    * PROFILE PHOTO STORE
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
    * EDIT
    *====================================
    */
    public function edit(){
        try {
            $person = PersonMdl::where('user_id',Auth::user()->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            if (App::getLocale()=='ar') {
                $countries = CountryMdl::where('status',1)->orderBy('name_ar','asc')->get();
            } else {
                $countries = CountryMdl::where('status',1)->orderBy('name_en','asc')->get();
            }

        } catch (\Throwable $th) {
            return 404;
        }

        return view('person.profile.profile',compact('person','countries'));
    }
    /*
    *====================================
    * UPDATE
    *====================================
    */
    public function update(Request $req){
        $valid = Validator::make($req->all(),[
            'person'     =>'required|numeric|exists:persons,id',
            'gender'     =>'required|numeric',
            'birth_date' =>'required',
            'country'    =>'nullable|numeric|exists:countries,id',
            'located'    =>'required|string|min:3',
            'specialist' =>'required|string|min:3',
            'cv'         =>'nullable|mimes:pdf'
        ],[
            'person.required' =>__('admin.Field Is Required.'),
            'person.numeric'  =>__('admin.Format Not Matching.'),
            'person.exists'   =>__('admin.This Value Is Not Exists.'),

            'gender.required' =>__('admin.Field Is Required.'),
            'gender.numeric'  =>__('admin.Format Not Matching.'),

            'birth_date.required' =>__('admin.Field Is Required.'),
            //'birth_date.date'     =>__('admin.Format Not Matching.'),

            //'country.required' =>__('admin.Field Is Required.'),
            'country.numeric'  =>__('admin.Format Not Matching.'),
            'country.exists'   =>__('admin.This Value Is Not Exists.'),

            'located.required' =>__('admin.Field Is Required.'),
            'located.string'   =>__('admin.Format Not Matching.'),
            'located.min'      =>__('admin.This Value Is Too Short'),

            'specialist.required' =>__('admin.Field Is Required.'),
            'specialist.string'   =>__('admin.Format Not Matching.'),
            'specialist.min'      =>__('admin.This Value Is Too Short'),


            'cv.mimes'    =>__('admin.File Not Allowed.'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $person  = PersonMdl::findOrFail($req->person);
        } catch (\Throwable $th) {
            return 404;
        }

        if ($req->hasFile('cv')) {
            $img = $req->file('cv');
            $cvName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/cvs'), $cvName);
            File::delete('imgs/cvs/' . $req->oldCV);
        } else {
            $cvName = $req->oldCV;
        }

        $person->county_id = $req->country;
        $person->gender = $req->gender;
        $person->birth_date = Carbon::createFromFormat('d/m/Y', $req->birth_date);
        $person->located_at = $req->located;
        $person->specialist = $req->specialist;
        $person->cv = $cvName;
        $person->save();

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));

        return redirect()->route('home');
    }
    /*
    *====================================
    *
    *====================================
    */
}