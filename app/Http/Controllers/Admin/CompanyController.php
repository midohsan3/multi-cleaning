<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyMdl;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $companies = CompanyMdl::orderBy('id','desc')->paginate(pageCount);
    } catch (\Throwable $th) {
        return 404;
    }

    $companiesCount = $companies->count();

    return view('admin.company.index', compact('companies','companiesCount'));
  }
   /*
   *====================================
   *
   *====================================
   */
}