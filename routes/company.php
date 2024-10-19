<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\NationalityController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Company\CDashboardController;
use App\Http\Controllers\Company\CServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
==============================
DASHBOARD ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard',
        'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [CDashboardController::class, 'index'])->name('company.dashboard');

        Route::get('/logo/create', [CDashboardController::class, 'createLogo'])->name('company.logo.create');

        Route::post('/logo/store', [CDashboardController::class, 'storeLogo'])->name('company.logo.store');

        Route::get('/license/create', [CDashboardController::class, 'createLicense'])->name('company.license.create');

        Route::post('/license/store', [CDashboardController::class, 'storeLicense'])->name('company.license.store');

    }
);

/*
==============================
SERVICE ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/company/dashboard/service',
        'namespace' => 'Company',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [CServiceController::class, 'index'])->name('company.service.index');
    }
);
