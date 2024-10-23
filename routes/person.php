<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Person\PDashboardController;
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
        'prefix' => LaravelLocalization::setLocale() . '/single/dashboard',
        'namespace' => 'Person',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [PDashboardController::class, 'index'])->name('person.dashboard');

        Route::get('/profile/create', [PDashboardController::class, 'createLogo'])->name('person.profile.photo.create');

        Route::post('/profile/store', [PDashboardController::class, 'storeLogo'])->name('person.profile.photo.store');

        Route::get('/profile/edit', [PDashboardController::class, 'edit'])->name('person.profile.edit');

        Route::post('/profile/update', [PDashboardController::class, 'update'])->name('person.profile.update');

    }
);