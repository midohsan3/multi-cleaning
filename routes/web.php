<?php

use App\Http\Controllers\Front\FrontController;
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
Route::view('/', 'welcome');

Route::view('dashboard', 'layouts.admin')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

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
}
);
/*
==============================
FRONT ROUTES
==============================
*/
Route::group(
[
'prefix' => current_country().'/'.LaravelLocalization::setLocale(),
'namespace' => 'Front',
'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
],
function () {

Route::get('/', [FrontController::class, 'home'])->name('front.home');
}
);