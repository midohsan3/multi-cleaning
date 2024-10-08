<?php

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
  }
);
