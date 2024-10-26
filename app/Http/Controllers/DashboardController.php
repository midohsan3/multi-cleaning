<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role_name == 'Owner') {
            return redirect()->route('admin.dashboard');
        } elseif(Auth::user()->role_name == 'Company') {
            return redirect()->route('company.dashboard');
        }elseif(Auth::user()->role_name == 'Person') {
            return redirect()->route('person.dashboard');
        }
    }
    /*
    *====================================
    *
    *====================================
    */
}