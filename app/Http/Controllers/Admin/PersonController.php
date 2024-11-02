<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\PersonMdl;
use App\Models\CountryMdl;
use Illuminate\Http\Request;
use App\Models\NationalityMdl;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
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
    public function index()
    {
        try {
            $persons = PersonMdl::orderBy('id', 'desc')->paginate(pageCount);
        } catch (\Throwable $th) {
            return 404;
        }

        $personsCount = $persons->count();

        return view('admin.person.index', compact('persons', 'personsCount'));
    }
    /*
    *====================================
    * EDIT
    *====================================
    */
    public function edit($person){
        try {
            $person = PersonMdl::findOrFail($person);
        } catch (\Throwable $th) {
           return 404;
        }

        try {
            if (App::getLocale()=='ar') {
               $nationalities = NationalityMdl::where('status',1)->orderBy('name_ar','asc')->get();
            } else {
                $nationalities = NationalityMdl::where('status',1)->orderBy('name_en','asc')->get();
            }
        } catch (\Throwable $th) {
            return 404;
        }
        try {
            if (App::getLocale()=='ar') {
               $countries = CountryMdl::where('status',1)->orderBy('name_ar','asc')->get();
            } else {
                $countries = CountryMdl::where('status',1)->orderBy('name_en','asc')->get();
            }
        } catch (\Throwable $th) {
            return 404;
        }
        return view('admin.person.edit', compact('person','nationalities','countries'));
    }
    /*
    *====================================
    * UPDATE
    *====================================
    */
    public function update(Request $req){
        $valid = Validator::make($req->all(),[
            'person' =>'required|numeric|exists:persons,id',
            'gender' =>'required|numeric',
            'nameEn' =>'required|string|min:3',
            'birth_date' =>'required',
            'nationality' =>'nullable|numeric|exists:nationalities,id',
            'country' =>'nullable|numeric|exists:countries,id',
            'located' =>'required|string|min:3',
            'specialist' =>'required|string|min:3',
            'cv' =>'nullable|mimes:pdf,doc,docx',
        ],[
            'person.required' =>__('admin.Field Is Required.'),
            'person.numeric' =>__('admin.Format Not Matching.'),
            'person.exists' =>__('admin.This Value Is Not Exists.'),

            'gender.required' =>__('admin.Field Is Required.'),
            'gender.numeric' =>__('admin.Format Not Matching.'),

            'birth_date.required' =>__('admin.Field Is Required.'),
            //'birth_date.date' =>__('admin.Format Not Matching.'),

            'nationality.required' =>__('admin.Field Is Required.'),
            'nationality.numeric' =>__('admin.Format Not Matching.'),
            'nationality.exists' =>__('admin.This Value Is Not Exists.'),

            'country.required' =>__('admin.Field Is Required.'),
            'country.numeric' =>__('admin.Format Not Matching.'),
            'country.exists' =>__('admin.This Value Is Not Exists.'),

            'located.required' =>__('admin.Field Is Required.'),
            'located.string' =>__('admin.Format Not Matching.'),
            'located.min' =>__('admin.This Value Is Too Short'),

            'specialist.required' =>__('admin.Field Is Required.'),
            'specialist.string' =>__('admin.Format Not Matching.'),
            'specialist.min' =>__('admin.This Value Is Too Short'),

            'cv.mimes' =>__('admin.File Not Allowed.'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        try {
            $person = PersonMdl::findOrFail($req->person);
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $user = User::findOrFail($person->user_id);
        } catch (\Throwable $th) {
            return 404;
        }

        if ($req->hasFile('cv')) {
            $img = $req->file('cv');
            $cvName = rand() . '.' . $img->getClientOriginalExtension();
            //save file like a temp
            $img->move(('imgs/cvs'), $cvName);
            File::delete('imgs/cvs/' . $req->oldCV);
        } else {
            $cvName = $req->oldCV;
        }

        try {
            $user->name = $req->nameEn;
            $user->save();
        } catch (\Throwable $th) {
            return 404;
        }

        try {
            $person->nationality_id = $req->nationality;
            $person->county_id = $req->country;
            $person->gender = $req->gender;
            $person->birth_date = Carbon::createFromFormat('d/m/Y', $req->birth_date);
            $person->located_at = $req->located;
            $person->specialist = $req->specialist;
            $person->cv = $cvName;
            $person->save();
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