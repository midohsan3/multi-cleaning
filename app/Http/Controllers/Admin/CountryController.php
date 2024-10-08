<?php

namespace App\Http\Controllers\Admin;

use App\Models\CountryMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
   }

   /*
   *====================================
   * INDEX
   *====================================
   */
  public function index(){

    if(App::getLocale()=='ar'){
      $countries = CountryMdl::orderBy('name_ar','asc')->paginate(pageCount);
    }else{
      $countries = CountryMdl::orderBy('name_ar','asc')->paginate(pageCount);
    }

    $countriesCount = $countries->count();

    return view('admin.country.index', compact('countries', 'countriesCount'));
  }
   /*
   *====================================
   *
   *====================================
   */
}
