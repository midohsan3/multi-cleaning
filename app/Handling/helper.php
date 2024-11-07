<?php

use App\Models\CountryMdl;
use App\Models\ActivityMdl;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Stevebauman\Location\Facades\Location;

define('pageCount', 20);

/*
============================
= LOCATION
============================
*/
function current_country()
{
   $ip=Request()->ip();
   $loc= Location::get($ip);

   try {
    return Str::lower($loc->countryCode);
   } catch (\Throwable $th) {
    return 'us';
   }

}
/*
============================
= ACTIVE COUNTRIES
============================
*/
function active_countries(){
    try {
        if(App::getLocale()=='ar'){
            return CountryMdl::where('status',1)->orderBy('name_ar','asc')->get();
        }else{
            return CountryMdl::where('status',1)->orderBy('name_en','asc')->get();
        }
    } catch (\Throwable $th) {
        return 404;
    }

}

/*
============================
= ACTIVE ACTIVITIES
============================
*/
function active_activities(){
    try {
            return ActivityMdl::where('status',1)->get();

    } catch (\Throwable $th) {
         return 404;
    }
}
/*
============================
=
============================
*/