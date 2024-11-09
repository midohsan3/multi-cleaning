<?php

namespace App\Http\Controllers\Company;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderMdl;

class CBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
         //$this->middleware('permission:receive-booking', ['only' => ['index']]);
         //$this->middleware('permission:role-create', ['only' => ['create', 'store']]);
         //$this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
         //$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /*
    *====================================
    * INDEX
    *====================================
    */
    public function index(){
        try {
            $orders = OrderMdl::whereNot('status',0)->orderBy('id','desc')->paginate(pageCount);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $ordersCount = $orders->count();
        } catch (\Throwable $th) {
            return 404;
        }
        return view('company.booking.index', compact('orders','ordersCount'));
    }

    /*
    *====================================
    *
    *====================================
    */
}
