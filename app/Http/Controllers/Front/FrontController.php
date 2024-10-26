<?php

namespace App\Http\Controllers\Front;

use App\Models\CountryMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\ActivityMdl;
use App\Models\CompanyConnectionMdl;
use App\Models\CompanyMdl;
use App\Models\CountryHasActivityMdl;

class FrontController extends Controller
{
    /*
    *====================================
    * INDEX
    *====================================
    */
    public function index(){
         try {
            if(App::getLocale()=='ar'){
                $countries = CountryMdl::where('status',1)->orderBy('name_ar','asc')->get();
            }else{
                $countries = CountryMdl::where('status',1)->orderBy('name_en','asc')->get();
            }

         } catch (\Throwable $th) {
            return 404;
         }

         try {
            $countriesCode = $countries->pluck('country_code')->all();
         } catch (\Throwable $th) {
            return 404;
         }

         if(in_array(Str::upper(current_country()),$countriesCode)){
            return redirect()->route('front.home',current_country());
         }else{
            return view('front.main', compact('countries'));
         }
    }
    /*
    *====================================
    * HOME
    *====================================
    */
    public function home($country_code){
        try {
            $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $countryActivities = DB::table('countries_has_activities')->where('country_id',$country->id)->get()->pluck('activity_id');
        } catch (\Throwable $th) {
             return 404;
        }

        try {
            if(App::getLocale()=='ar'){
                $activities = ActivityMdl::whereIn('id',$countryActivities)->orderBy('name_ar','asc')->get();
            }else{
                $activities = ActivityMdl::whereIn('id',$countryActivities)->orderBy('name_en','asc')->get();
            }
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companies = CompanyMdl::where([['status',1],['country_id',$country->id]])->inRandomOrder()->limit(20)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companiesId = $companies->pluck('id')->all();

            $connections = CompanyConnectionMdl::whereIn('company_id',$companiesId)->get();
        } catch (\Throwable $th) {
             return 404;
        }

        return view('front.home',compact('activities','companies','connections'));
    }
    /*
    *====================================
    *
    *====================================
    */
}
