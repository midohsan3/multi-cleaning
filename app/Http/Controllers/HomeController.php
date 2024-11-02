<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_name == 'Owner') {
            return redirect()->route('admin.dashboard');
        } elseif(Auth::user()->role_name == 'Company') {
            return redirect()->route('company.dashboard');
        }elseif(Auth::user()->role_name == 'Person') {
            return redirect()->route('person.dashboard');
        }
    }
}
