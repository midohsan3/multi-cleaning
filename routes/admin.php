<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\CountryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

define('pageCount',20);

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

Route::view('/', 'welcome');

Route::view('dashboard', 'layouts.admin')
  ->middleware(['auth', 'verified'])
  ->name('dashboard');

Route::view('profile', 'profile')
  ->middleware(['auth'])
  ->name('profile');

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
==============================
ACTIVITIES ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/activities',
    'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [ActivityController::class, 'index'])->name('admin.activity.index');

    Route::post('/store', [ActivityController::class, 'store'])->name('admin.activity.store');

    Route::get('/edit_{activity}', [ActivityController::class, 'edit'])->name('admin.activity.edit');

    Route::post('/update', [ActivityController::class, 'update'])->name('admin.activity.update');

    Route::get('/activate_{activity}', [ActivityController::class, 'activate'])->name('admin.activity.activate');

    Route::get('/deactivate_{activity}', [ActivityController::class, 'deactivate'])->name('admin.activity.deactivate');

    Route::post('/destroy', [ActivityController::class, 'destroy'])->name('admin.activity.destroy');
  }
);

/*
==============================
COUNTRIES ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/countries',
    'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [CountryController::class, 'index'])->name('admin.country.index');

    Route::post('/store', [CountryController::class, 'store'])->name('admin.country.store');

    Route::get('/edit_{country}', [CountryController::class, 'edit'])->name('admin.country.edit');

    Route::post('/update', [CountryController::class, 'update'])->name('admin.country.update');

    Route::get('/activate_{country}', [CountryController::class, 'activate'])->name('admin.country.activate');

    Route::get('/deactivate_{country}', [CountryController::class, 'deactivate'])->name('admin.country.deactivate');

    Route::post('/destroy', [CountryController::class, 'destroy'])->name('admin.country.destroy');
  }
);
