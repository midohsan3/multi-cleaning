<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderMdl;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
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
    public function index():View{
        try {
            $orders = OrderMdl::orderBy('id','desc')->paginate(pageCount);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $ordersCount = $orders->count();
        } catch (\Throwable $th) {
            return 404;

        }

        return view('admin.booking.index', compact('orders','ordersCount'));
    }
    /*
    *====================================
    * APPROVE
    *====================================
    */
    public function approve($order){
        try {
            $booking = OrderMdl::findOrFail($order);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $booking->status = 1;
            $booking->save();
        } catch (\Throwable $th) {
            return 404;
        }

        Alert::success(__('admin.Success'),__('admin.Record Updated Successfully.'));
        return back();
    }
    /*
    *====================================
    *
    *====================================
    */
}
