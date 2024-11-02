<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\NationalityController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Contracts\Permission;

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

require __DIR__ . '/auth.php';
*/
Auth::routes();

Route::group(
[
'prefix' => LaravelLocalization::setLocale(),
'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']
],
function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

}
);


/*
==============================
DASHBOARD ROUTES
==============================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    }
);

/*
==============================
COMPANIES ROUTES
==============================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/companies',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [CompanyController::class, 'index'])->name('admin.company.index');

        Route::get('/package_{company}', [CompanyController::class, 'getPackage'])->name('admin.company.package');

        Route::post('/package/store', [CompanyController::class, 'storePackage'])->name('admin.company.package.store');

        Route::get('/activate_{company}', [CompanyController::class, 'activate'])->name('admin.company.activate');

        Route::get('/deactivate_{company}', [CompanyController::class, 'deactivate'])->name('admin.company.deactivate');

        Route::post('/destroy', [CompanyController::class, 'destroy'])->name('admin.company.destroy');
    }
);

/*
==============================
PERSONS ROUTES
==============================
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/person',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [PersonController::class, 'index'])->name('admin.person.index');

        Route::get('/edit_{person}', [PersonController::class, 'edit'])->name('admin.person.edit');

        Route::post('/update', [PersonController::class, 'update'])->name('admin.person.update');
    }
);

/*
==============================
ROLES ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/roles',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');

        Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');

        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');

        Route::get('/edit_{id}', [RoleController::class, 'edit'])->name('admin.role.edit');

        Route::post('/update_{id}', [RoleController::class, 'update'])->name('admin.role.update');

        Route::post('/destroy', [RoleController::class, 'destroy'])->name('admin.role.destroy');
    }
);

/*
==============================
PERMISSION ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/roles/permission',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [PermissionController::class, 'index'])->name('admin.role.permission.index');

        Route::post('/store', [PermissionController::class, 'store'])->name('admin.role.permission.store');

        Route::post('/destroy', [PermissionController::class, 'destroy'])->name('admin.role.permission.destroy');
    }
);

/*
==============================
ACTIVITIES ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/activities',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [ActivityController::class, 'index'])->name('admin.activity.index');

        Route::post('/store', [ActivityController::class, 'store'])->name('admin.activity.store');

        Route::get('/edit_{activity}', [ActivityController::class, 'edit'])->name('admin.activity.edit');

        Route::post('/update', [ActivityController::class, 'update'])->name('admin.activity.update');

        Route::get('/servs_{activity}', [ActivityController::class, 'service'])->name('admin.activity.service');

        Route::post('/servs/update', [ActivityController::class, 'serviceUpdate'])->name('admin.activity.service.update');

        Route::get('/activate_{activity}', [ActivityController::class, 'activate'])->name('admin.activity.activate');

        Route::get('/deactivate_{activity}', [ActivityController::class, 'deactivate'])->name('admin.activity.deactivate');

        Route::post('/destroy', [ActivityController::class, 'destroy'])->name('admin.activity.destroy');
    }
);

/*
==============================
SERVICES ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/activities/services',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');

        Route::post('/store', [ServiceController::class, 'store'])->name('admin.service.store');

        Route::get('/edit_{service}', [ServiceController::class, 'edit'])->name('admin.service.edit');

        Route::post('/update', [ServiceController::class, 'update'])->name('admin.service.update');

        Route::get('/activate_{service}', [ServiceController::class, 'activate'])->name('admin.service.activate');

        Route::get('/deactivate_{service}', [ServiceController::class, 'deactivate'])->name('admin.service.deactivate');

        Route::post('/destroy', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
    }
);

/*
==============================
PACKAGES ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/packages',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [PackageController::class, 'index'])->name('admin.package.index');

        Route::get('/create', [PackageController::class, 'create'])->name('admin.package.create');

        Route::post('/store', [PackageController::class, 'store'])->name('admin.package.store');

        Route::get('/edit_{package}', [PackageController::class, 'edit'])->name('admin.package.edit');

        Route::post('/update', [PackageController::class, 'update'])->name('admin.package.update');

        Route::get('/activate_{package}', [PackageController::class, 'activate'])->name('admin.package.activate');

        Route::get('/deactivate_{package}', [PackageController::class, 'deactivate'])->name('admin.package.deactivate');

        Route::post('/destroy', [PackageController::class, 'destroy'])->name('admin.package.destroy');
    }
);

/*
==============================
FEATURES ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/packages/features',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [FeatureController::class, 'index'])->name('admin.feature.index');

        Route::post('/store', [FeatureController::class, 'store'])->name('admin.feature.store');

        Route::get('/edit_{feature}', [FeatureController::class, 'edit'])->name('admin.feature.edit');

        Route::post('/update', [FeatureController::class, 'update'])->name('admin.feature.update');

        Route::get('/activate_{feature}', [FeatureController::class, 'activate'])->name('admin.feature.activate');

        Route::get('/deactivate_{feature}', [FeatureController::class, 'deactivate'])->name('admin.feature.deactivate');

        Route::post('/destroy', [FeatureController::class, 'destroy'])->name('admin.feature.destroy');
    }
);

/*
==============================
COUNTRIES ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/countries',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [CountryController::class, 'index'])->name('admin.country.index');

        Route::post('/store', [CountryController::class, 'store'])->name('admin.country.store');

        Route::get('/edit_{country}', [CountryController::class, 'edit'])->name('admin.country.edit');

        Route::post('/update', [CountryController::class, 'update'])->name('admin.country.update');

        Route::get('/activities_{country}', [CountryController::class, 'activities'])->name('admin.country.activities');

        Route::post('/activities/update', [CountryController::class, 'activitiesUpdate'])->name('admin.country.activities.update');

        Route::get('/activate_{country}', [CountryController::class, 'activate'])->name('admin.country.activate');

        Route::get('/deactivate_{country}', [CountryController::class, 'deactivate'])->name('admin.country.deactivate');

        Route::post('/destroy', [CountryController::class, 'destroy'])->name('admin.country.destroy');
    }
);

/*
==============================
NATIONALITY ROUTES
==============================
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin/dashboard/nationality',
        'namespace' => 'Admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/', [NationalityController::class, 'index'])->name('admin.nationality.index');

        Route::post('/store', [NationalityController::class, 'store'])->name('admin.nationality.store');

        Route::get('/edit_{nationality}', [NationalityController::class, 'edit'])->name('admin.nationality.edit');

        Route::post('/update', [NationalityController::class, 'update'])->name('admin.nationality.update');

        Route::get('/activate_{nationality}', [NationalityController::class, 'activate'])->name('admin.nationality.activate');

        Route::get('/deactivate_{nationality}', [NationalityController::class, 'deactivate'])->name('admin.nationality.deactivate');

        Route::post('/destroy', [NationalityController::class, 'destroy'])->name('admin.nationality.destroy');
    }
);