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
use App\Models\CompanyGalleryMdl;
use App\Models\CompanyHasServiceMdl;
use App\Models\CompanyMdl;
use App\Models\CountryHasActivityMdl;
use App\Models\PersonMdl;
use App\Models\ServiceMdl;

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
    * FORGET PASSWORD
    *====================================
    */
    public function passwordForget(){
        return view('auth.forgot-password');
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

        try {
            $cvs =PersonMdl::where([['status',1],['county_id',$country->id]])->inRandomOrder()->limit(4)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        return view('front.home',compact('country','activities','companies','connections','cvs'));
    }
    /*
    *====================================
    * ACTIVITIES
    *====================================
    */
    public function activities($country_code,$activity){
        try {
        $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
        return 404;
        }

        try {
        $activity = ActivityMdl::findOrFail($activity);
        } catch (\Throwable $th) {
        return 404;
        }

        try {
            $companies =
            CompanyMdl::where([['status',1],['country_id',$country->id],['activity_id',$activity->id]])->get()->pluck('id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $activityServices = DB::table('activity_has-services')->where('activity_id',$activity->id)->get()->pluck('service_id');
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            if (App::getLocale()=='ar') {
               $services = ServiceMdl::whereIn('id',$activityServices)->orderBy('name_ar','asc')->get();
            } else {
               $services = ServiceMdl::whereIn('id',$activityServices)->orderBy('name_en','asc')->get();
            }

        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companiesServices = CompanyHasServiceMdl::whereIn('company_id',$companies)->get()->countBy('service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        return view('front.activitityServices', compact('country','activity','services','companiesServices'));
    }
    /*
    *====================================
    * COMPANIES BY SERVICES
    *====================================
    */
    public function services($country_code,$activity,$service){
        try {
            $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $activity = ActivityMdl::findOrFail($activity);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $service = ServiceMdl::findOrFail($service);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companiesService = CompanyHasServiceMdl::where('service_id',$service->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companies =
        CompanyMdl::whereIn('id',$companiesService->pluck('company_id')->all())->where([['status',1],['country_id',$country->id],['activity_id',$activity->id]])->inRandomOrder()->paginate(pageCount);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $connections = CompanyConnectionMdl::whereIn('company_id',$companies->pluck('id')->all())->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companiesServicesDetails = CompanyHasServiceMdl::whereIn('company_id',$companiesService->pluck('company_id')->all())->where('service_id',$service->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $servicesPrice = $companiesServicesDetails->pluck('price','company_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $servicesPhoto = $companiesServicesDetails->pluck('photo','company_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $activityServices = DB::table('activity_has-services')->where('activity_id',$activity->id)->get()->pluck('activity_id');
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $relatedServices = ServiceMdl::whereIn('id',$activityServices)->limit(4)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        return view('front.servicesCompany',
        compact('country','activity','service','companies','connections','servicesPrice','servicesPhoto','relatedServices'));
    }
    /*
    *====================================
    * SINGLE COMPANY
    *====================================
    */
    public function singleCompany($country_code,$company_url){
        try {
            $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $company = CompanyMdl::where('url',$company_url)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companyServices = CompanyHasServiceMdl::where('company_id',$company->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $servicesCount = $companyServices->count();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $services = ServiceMdl::whereIn('id',$companyServices->pluck('service_id')->all())->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $servicesPrice = $companyServices->pluck('price','service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $servicesPhotos = $companyServices->pluck('photo','service_id')->all();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $communications = CompanyConnectionMdl::where('company_id',$company->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $companyPhotos = CompanyGalleryMdl::where('company_id',$company->id)->get();
        } catch (\Throwable $th) {
            return 404;
        }

        return
        view('front.company',compact('country','company','servicesCount','services','servicesPrice','servicesPhotos','communications','companyPhotos'));
    }
    /*
    *====================================
    * CVS
    *====================================
    */
    public function cvs($country_code){
        try {
            $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $cvs = PersonMdl::where([['status',1],['county_id',$country->id]])->inRandomOrder()->paginate(pageCount);
        } catch (\Throwable $th) {
            return 404;
        }

        return view('front.cvs',compact('country','cvs'));
    }
    /*
    *====================================
    *
    *====================================
    */
}