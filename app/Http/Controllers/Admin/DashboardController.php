<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
    return view('layouts.admin');
  }
   /*
   *====================================
   *
   *====================================
   */
}