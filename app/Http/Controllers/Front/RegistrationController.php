<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\CompanyMdl;
use App\Models\CountryMdl;
use App\Models\ActivityMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\NationalityMdl;
use App\Models\PersonMdl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{

    /*
    *====================================
    * INDEX
    *====================================
    */

    public function companyRegister()
    {
        try {
            $countries = CountryMdl::select('id','phone_code')->where('status', 1)->orderBy('phone_code', 'asc')->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            if (App::getLocale() == 'ar') {
                $activities = ActivityMdl::select('id','name_ar')->where('status', 1)->orderBy('name_ar', 'asc')->get();
            }else{
                $activities = ActivityMdl::select('id','name_en')->where('status',1)->orderBy('name_en','asc')->get();
            }
        } catch (\Throwable $th) {
            return 404;
        }

        return view('front.companyRegister', compact('countries','activities'));
    }

    /*
    *====================================
    * STORE COMPANY
    *====================================
    */
    public function StoreCompanyRegister(Request $req){
        $valid = Validator::make($req->all(),[
            'companyName'=>'required|string|min:3',
            'ownerName'  =>'required|string|min:3',
            'country'    =>'required|numeric|exists:countries,id',
            'phone'      =>'required|numeric|min:9|unique:users,phone',
            'email'      =>'required|email|unique:users,email',
            'password'   =>'required|confirmed|min:4',
            'activity'   =>'required|numeric|exists:activities,id',
        ],[
            'companyName.required' =>__('front.Field Is Required.'),
            'companyName.string'   =>__('front.Format Not Matching.'),
            'companyName.min'      =>__('front.The Value You Entered Too Short.'),

            'ownerName.required' =>__('front.Field Is Required.'),
            'ownerName.string'   =>__('front.Format Not Matching.'),
            'ownerName.min'      =>__('front.The Value You Entered Too Short.'),

            'country.required' =>__('front.Field Is Required.'),
            'country.numeric'  =>__('front.Format Not Matching.'),
            'country.exists'   =>__('front.This Value Not Exists.'),

            'phone.required' =>__('front.Field Is Required.'),
            'phone.numeric'  =>__('front.Format Not Matching.'),
            'phone.min'      =>__('front.The Value You Entered Too Short.'),
            'phone.max'      =>__('front.The Value You Entered Too Long.'),
            'phone.unique'   =>__('front.This Value Is Already Exists.'),

            'email.required' =>__('front.Field Is Required.'),
            'email.email'    =>__('front.Format Not Matching.'),
            'email.unique'   =>__('front.This Value Is Already Exists.'),

            'password.required'  =>__('front.Field Is Required.'),
            'password.confirmed' =>__('front.Password Not Matching.'),
            'password.min'       =>__('front.The Value You Entered Too Short.'),

            'activity.required' =>__('front.Field Is Required.'),
            'activity.numeric'  =>__('front.Format Not Matching.'),
            'activity.exists'   =>__('front.This Value Not Exists.'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $country = CountryMdl::findOrFail($req->country);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $user = User::create([
                'name'      =>$req->ownerName,
                'email'     =>$req->email,
                'password'  =>Hash::make($req->password),
                'role_name' =>'Company',
                'phone'     =>$country->phone_code.$req->phone,
            ]);
        } catch (\Throwable $th) {
            return 404;
        }

        $user->assignRole('Company');

        try {
            $company = CompanyMdl::create([
                'code'        =>($user->id + 1).Str::random(2),
                'user_id'     =>$user->id,
                'name_en'     =>$req->companyName,
                'name_ar'     =>$req->companyName,
                'country_id'  =>$req->country,
                'activity_id' =>$req->activity,
            ]);
        } catch (\Throwable $th) {
            return 404;
        }

        Auth::login($user);

        return redirect()->route('home');
    }
    /*
    *====================================
    * PERSON REGISTER
    *====================================
    */
    public function personRegister(){
        try {
            if (App::getLocale()=='ar') {
                $nationalities = NationalityMdl::where('status',1)->orderBy('name_ar','asc')->get();
            } else {
                $nationalities = NationalityMdl::where('status',1)->orderBy('name_en','asc')->get();
            }
        } catch (\Throwable $th) {
            return 404;
        }
        return view('front.personRegister', compact('nationalities'));
    }
    /*
    *====================================
    * PERSON STORE
    *====================================
    */
    public function storePersonRegister(Request $req){
        $valid = Validator::make($req->all(),[
            'name'        =>'required|string|min:3',
            'nationality' =>'required|numeric|exists:nationalities,id',
            'phone'       =>'required|numeric|min:9|unique:users,phone',
            'email'       =>'required|email|unique:users,email',
            'password'    =>'required|confirmed|min:4',
        ],[
            'name.required' =>__('front.Field Is Required.'),
            'name.string'   =>__('front.Format Not Matching.'),
            'name.min'      =>__('front.The Value You Entered Too Short.'),

            'nationality.required' =>__('front.Field Is Required.'),
            'nationality.numeric'  =>__('front.Format Not Matching.'),
            'nationality.exists'   =>__('front.This Value Not Exists.'),

            'phone.required' =>__('front.Field Is Required.'),
            'phone.numeric'  =>__('front.Format Not Matching.'),
            'phone.min'      =>__('front.This Value Is Already Exists.'),
            'phone.unique'   =>__('front.This Value Not Exists.'),

            'email.required' =>__('front.Field Is Required.'),
            'email.email'    =>__('front.Format Not Matching.'),
            'email.unique'   =>__('front.This Value Not Exists.'),

            'password.required' =>__('front.Field Is Required.'),
            'password.confirmed' =>__('front.Password Not Matching.'),
            'password.min' =>__('front.The Value You Entered Too Short.'),
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
        $user = User::create([
            'name'      =>$req->name,
            'email'     =>$req->email,
            'password'  =>Hash::make($req->password),
            'role_name' =>'Person',
            'phone'     =>$req->phone,
        ]);
        } catch (\Throwable $th) {
        return 404;
        }

         $user->assignRole('Person');

         try {
            $person = PersonMdl::create([
                'user_id' =>$user->id,
                'nationality_id' =>$req->nationality,
            ]);
         } catch (\Throwable $th) {
            return 404;
         }

         Auth::login($user);

         return redirect()->route('home');
    }
    /*
    *====================================
    *
    *====================================
    */
}
