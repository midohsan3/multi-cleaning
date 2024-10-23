<?php

namespace App\Http\Controllers\Front;

use App\Models\CountryMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

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
            return redirect()->route('front.home');
         }else{
            return view('front.main', compact('countries'));
         }
    }
    /*
    *====================================
    * HOME
    *====================================
    */
    public function home(){
        return view('front.home');
    }
    /*
    *====================================
    *
    *====================================
    */
}
