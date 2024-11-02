<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('permission:receive-booking', ['only' => ['index']]);
         //$this->middleware('permission:role-create', ['only' => ['create', 'store']]);
         //$this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /*
    *====================================
    * INDEX
    *====================================
    */
    public function index(): View{
        return view('company.booking.index');
    }

    /*
    *====================================
    *
    *====================================
    */
}
