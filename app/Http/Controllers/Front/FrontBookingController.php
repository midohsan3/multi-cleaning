<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\User;
use App\Models\OrderMdl;
use App\Models\CompanyMdl;
use App\Models\CountryMdl;
use App\Models\ServiceMdl;
use App\Models\CustomerMdl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyHasServiceMdl;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FrontBookingController extends Controller
{
    /*
    *====================================
    * CREATE
    *====================================
    */
    public function create($country_code,$company,$service){
        try {
            $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $company = CompanyMdl::findOrFail($company);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $service = ServiceMdl::findOrFail($service);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $price= CompanyHasServiceMdl::select('price')->where([['company_id',$company->id],['service_id',$service->id]])->first();
        } catch (\Throwable $th) {
            return 404;
        }

        return view('front.booking.userInfo', compact('country','company','service','price'));
    }
    /*
    *====================================
    * STORE
    *====================================
    */
    public function store(Request $req ,$country_code){
        $valid = Validator::make($req->all(),[
            'company'  =>'required|numeric|exists:companies,id',
            'service'  =>'required|numeric|exists:services,id',
            'price'    =>'required|numeric|not_in:0',
            'name'     =>'required|string|min:3',
            'phoneCode'=>'required|numeric|min:3',
            'phone'    =>'required|numeric',
            'email'    =>'nullable|email|unique:users,email',
            'pare'     =>'required|numeric|min:1|max:3',
            'duration' =>'required|numeric|min:1',
            'startDate'=>'required',
        ],[
            'company.required' =>__('front.Field Is Required.'),
            'company.numeric'  =>__('front.Format Not Matching.'),
            'company.exists'   =>__('front.This Value Not Exists.'),

            'service.required' =>__('front.Field Is Required.'),
            'service.numeric'  =>__('front.Format Not Matching.'),
            'service.exists'   =>__('front.This Value Not Exists.'),

            'price.required' =>__('front.Field Is Required.'),
            'price.numeric'  =>__('front.Format Not Matching.'),
            'price.not_in'   =>__('front.The Value You Entered Too Short.'),

            'name.required' =>__('front.Field Is Required.'),
            'name.string'   =>__('front.Format Not Matching.'),
            'name.min'      =>__('front.The Value You Entered Too Short.'),

            'phoneCode.required' =>__('front.Field Is Required.'),
            'phoneCode.numeric' =>__('front.Format Not Matching.'),
            'phoneCode.min' =>__('front.The Value You Entered Too Short.'),

            'phone.required' =>__('front.Field Is Required.'),
            'phone.numeric' =>__('front.Format Not Matching.'),
            'phone.min' =>__('front.The Value You Entered Too Short.'),
            'phone.max' =>__('front.The Value You Entered Too Long.'),

            'email.email' =>__('front.Format Not Matching.'),
            'email.unique' =>__('front.This Value Is Already Exists.'),

            'pare.required' =>__('front.Field Is Required.'),
            'pare.numeric' =>__('front.Format Not Matching.'),
            'pare.min' =>__('front.The Value You Entered Too Short.'),
            'pare.max' =>__('front.The Value You Entered Too Long.'),

            'duration.required' =>__('front.Field Is Required.'),
            'duration.numeric' =>__('front.Format Not Matching.'),
            'duration.min' =>__('front.The Value You Entered Too Short.'),

            'startDate.required' =>__('front.Field Is Required.'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $user = User::where('phone',$req->phoneCode.$req->phone)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        if (!$user) {
            try {
                $user = User::create([
                    'name'=>$req->name,
                    'email'=>$req->email,
                    'password'=>Hash::make('Customer'),
                    'role_name'=>'Customer',
                    'phone'=>$req->phoneCode.$req->phone,
                ]);
                $user->assignRole('Customer');

                $customer = CustomerMdl::create([
                'user_id' =>$user->id,
                'country_id' =>$country->id,
                ]);
            } catch (\Throwable $th) {
               return 404;
            }
        }

        try {
            $customer = CustomerMdl::where('user_id',$user->id)->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $startDate =Carbon::parse($req->startDate)->format('Y-m-d');
        } catch (\Throwable $th) {
            return 404;
        }

        if ($req->startTime) {
            $startTime =date('H:i:s', strtotime($req->startTime));
        }else{
            $startTime = Carbon::parse('09:00:00')->format('H:i:s');
        }

        try {
            $startedAt = $startDate.' '.$startTime;
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            if ($req->pare==1 && $req->duration<11) {
                $total = $req->price*$req->duration;
                $endAt = Carbon::parse($startedAt)->addHours($req->duration);
            } elseif($req->pare==2 && $req->duration==1) {
                $total = $req->price*$req->duration*10;
                $endAt = Carbon::parse($startedAt)->addHours(10);
            } elseif($req->pare==2 && $req->duration>1) {
                $total = $req->price*$req->duration*10;
                $endAt = Carbon::parse($startedAt)->addDays($req->duration-1);
            }elseif($req->pare==3 && $req->duration==1){
                $total = $req->price*$req->duration*10*26;
                $endAt = Carbon::parse($startedAt)->addDays(26);
            }elseif($req->pare==3 && $req->duration>1){
                $total = $req->price*$req->duration*10*26;
                $endAt = Carbon::parse($startedAt)->addMonths($req->duration-1);
            }

        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $bookingCount =1;
            $bookingCount += OrderMdl::count();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $booking = OrderMdl::create([
                'country_id'  =>$country->id,
                'company_id'  =>$req->company,
                'customer_id' =>$customer->id,
                'service_id'  =>$req->service,
                'ref'         =>date('Y',strtotime(now())).$bookingCount+1,
                'duration_by' =>$req->pare,
                'duration'    =>$req->duration,
                'cost'        =>$req->price,
                'total'       =>$total,
                'started_at'  =>Carbon::parse($startedAt),
                'end_at'      =>Carbon::parse($endAt),
            ]);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $customer->address= $req->address;
            $customer->last_booking= Carbon::now();
            $customer->total_booking += $booking->total;
            $customer->save();
        } catch (\Throwable $th) {
            return 404;
        }

        return redirect()->route('front.booking.finish', ['country_code'=>Str::lower($country->country_code),'booking'=>$booking->id]);
    }
    /*
    *====================================
    * FINISH
    *====================================
    */
    public function finish($country_code,$booking){
        try {
            $country = CountryMdl::where('country_code',Str::Upper($country_code))->first();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $booking = OrderMdl::findOrFail($booking);
        } catch (\Throwable $th) {
            return 404;
        }
        return view('front.booking.finishBooking', compact('country','booking'));
    }
    /*
    *====================================
    *
    *====================================
    */
}