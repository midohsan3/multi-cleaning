<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\FrontBookingController;
use App\Http\Controllers\Front\RegistrationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::view('/', 'welcome');

Route::view('dashboard', 'layouts.admin')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Auth::routes();
*/


/*
==============================
DASHBOARD CHECK ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    }
);

/*
==============================
MAIN ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'namespace' => 'Front',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [FrontController::class, 'index'])->name('front.main');

        Route::get('/forget/password', [FrontController::class, 'passwordForget'])->name('front.password.forget');
    }
);

/*
==============================
FRONT ROUTES
==============================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/{country_code}',
        'namespace' => 'Front',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [FrontController::class, 'home'])->name('front.home');

        Route::get('/activities_{activity}', [FrontController::class, 'activities'])->name('front.home.activities');

        Route::get('/activities_{activity}/service_{service}', [FrontController::class, 'services'])->name('front.home.services');

        Route::get('/company/{company_url}', [FrontController::class, 'singleCompany'])->name('front.home.company.single');

        Route::get('/cvs', [FrontController::class, 'cvs'])->name('front.home.cvs');
    }
);

/*
==============================
BOOKING ROUTES
==============================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/{country_code}/booking',
        'namespace' => 'Front',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/info_{company}_{service}', [FrontBookingController::class, 'create'])->name('front.booking.create');

        Route::post('/store', [FrontBookingController::class, 'store'])->name('front.booking.store');

        Route::get('/finish_{booking}', [FrontBookingController::class, 'finish'])->name('front.booking.finish');
    }
);

/*
==============================
Authentication ROUTES
==============================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/registration',
        'namespace' => 'Front',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/company', [RegistrationController::class, 'companyRegister'])->name('front.company.register');

        Route::post('/company/store', [RegistrationController::class, 'StoreCompanyRegister'])->name('front.company.store');

        Route::get('/personal', [RegistrationController::class, 'personRegister'])->name('front.person.register');

        Route::post('/personal/store', [RegistrationController::class, 'storePersonRegister'])->name('front.person.store');
    }
);