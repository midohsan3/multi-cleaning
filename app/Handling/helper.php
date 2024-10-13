<?php

use App\Models\CountryMdl;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Stevebauman\Location\Facades\Location;
/*
============================
= LOCATION
============================
*/
function current_country()
{
  //$ip = Request()->ip();
  //return Location::get();
  return Str::lower(Location::get()->countryCode);
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
=
============================
*/