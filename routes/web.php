<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SchemesController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TblExportersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//  Landing page
Route::get('/', function () {
    return view('welcome')->with(['page_title' => 'FARP Login']);
})->name('welcome');

// All the login routes
Auth::routes();

Route::resource('roles', RoleController::class);

Route::get('expire-application/{id?}', [ApplicationController::class, 'expireApplication'])->name('expire.application');

// Exporter register and login
Route::get('/exporter-register', [TblExportersController::class, 'create'])->name('exporter.register');
Route::post('/exporter-login', [TblExportersController::class, 'login'])->name('exporter.login');
Route::post('/register', [TblExportersController::class, 'store'])->name('exporter.register.create');

Route::post('/check-mobile', [TblExportersController::class, 'checkMobile'])->name('exporter.check.mobile');
Route::post('/check-email', [TblExportersController::class, 'checkEmail'])->name('exporter.check.email');
Route::get('/profile', [TblExportersController::class, 'profile'])->name('exporter.profile');

// Route::get('/test', [TblExportersController::class, 'test'])->name('exporter.test');

Route::group(['prefix' => 'otp'], function () {
    Route::get('/send-otp', [OtpController::class, 'otp_view'])->name('exporter.view.otp');
    Route::post('/send-otp', [OtpController::class, 'send_otp'])->name('exporter.send.otp');
    Route::get('/verify-otp/{email}', [OtpController::class, 'verify_otp_view'])->name('exporter.view.verify.otp');
    Route::post('/verify-otp', [OtpController::class, 'send_generated_otp'])->name('exporter.verify.otp');
    // Route::post('/verify-otp', [OtpController::class, 'verify_otp'])->name('exporter.verify.otp');
});

// All the routes for exporters
Route::group(['prefix' => 'exporters', 'middleware' => 'expor-middle'], function () {
    Route::get('/show/{id}', [TblExportersController::class, 'show'])->name('exporter.details');

    Route::post('/check-user-name', [TblExportersController::class, 'checkUserName'])->name('exporter.check.username');
    Route::get('/exporter-reset-password', [TblExportersController::class, 'exporter_reset_password_view'])->name('exporter.reset.password.view');
    Route::post('/exporter-reset-password', [TblExportersController::class, 'exporter_reset_password'])->name('exporter.reset.password');

    Route::group(['prefix' => 'applications'], function () {
        Route::get('/scheme-list', [TblExportersController::class, 'scheme_list'])->name('exporter.scheme.list');
        Route::get('/list', [TblExportersController::class, 'application_list'])->name('exporter.application.list');
        Route::get('/rejected-list', [TblExportersController::class, 'rejected_application_list'])->name('exporter.rejected.application.list');
        Route::get('/appeal-list', [TblExportersController::class, 'appeal_application_list'])->name('exporter.appeal.application.list');

        Route::get('/annexure-1/{id?}', [TblExportersController::class, 'annexure1'])->name('exporter.application.annexure1');
        Route::get('/annexure-2/{id?}', [TblExportersController::class, 'annexure2'])->name('exporter.application.annexure2');
        Route::post('/annexure-1', [ApplicationController::class, 'submitApplication'])->name('exporter.application.annexure1.submit');

        Route::get('/pending-exporters-application-details/{id}', [ApplicationController::class, 'exporters_application_status_details'])->name('exporter.application.details');
        Route::post('/pending-exporters-application-details/{id}', [ApplicationController::class, 'exporters_application_status_details_complaince_submit'])->name('exporter.application.details.complaince.submit');

        Route::post('/appeal/{id}', [ApplicationController::class, 'exporters_appeal_submit'])->name('exporter.application.appeal.submit');
    });

    Route::group([], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('exporter.home');
        Route::get('/list', [TblExportersController::class, 'index'])->name('exporters.list');
    });
});

// All the routes for Departmental Users
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');

    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RolesController::class, 'index'])->name('admin.roles');
        Route::post('/', [RolesController::class, 'store'])->name('admin.roles.store');
        Route::get('/{id}', [RolesController::class, 'show'])->name('admin.roles.show');
        Route::post('/edit', [RolesController::class, 'edit'])->name('admin.roles.edit');
        // Route::get('/delete/{id}', [SchemesController::class, 'delete'])->name('admin.roles.delete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/user', [UsersController::class, 'users'])->name('admin.users');
        Route::post('/user', [UsersController::class, 'add_users'])->name('admin.users.add');
        Route::post('/show-user', [UsersController::class, 'show_user'])->name('admin.users.show');
        Route::post('/edit-user', [UsersController::class, 'edit_users'])->name('admin.users.edit');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
        Route::post('/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::group(['prefix' => 'schemes'], function () {
        Route::get('/', [SchemesController::class, 'index'])->name('admin.schemes');
        Route::post('/', [SchemesController::class, 'store'])->name('admin.schemes.store');
        Route::get('/{id}', [SchemesController::class, 'show'])->name('admin.schemes.show');
        Route::post('/edit', [SchemesController::class, 'edit'])->name('admin.schemes.edit');
        // Route::get('/delete/{id}', [SchemesController::class, 'delete'])->name('admin.schemes.delete');
    });

    Route::group(['prefix' => 'scrutiny-officer'], function () {
        Route::get('/pending-exporters', [AdminController::class, 'pending_exporters'])->name('admin.publicity.officer.pending.exporters');
        Route::get('/sanctioned-exporters', [ApplicationController::class, 'sanctioned_exporters_application'])->name('admin.publicity.officer.sanctioned.exporters');
        Route::post('/update-pending-exporters-status', [AdminController::class, 'update_pending_exporters_status'])->name('admin.publicity.officer.pending.exporters.status');

        Route::get('/pending-exporters-application', [ApplicationController::class, 'pending_exporters_application'])->name('admin.publicity.officer.pending.exporters.applications');
        Route::get('/pending-exporters-application-details/{id}', [ApplicationController::class, 'pending_exporters_application_details'])->name('admin.publicity.officer.pending.exporters.applications.details');
        Route::post('/pending-exporters-application-details-status/{id}', [ApplicationController::class, 'exporters_application_status_details_update'])->name('admin.publicity.officer.pending.exporters.applications.details.update');

        Route::get('/exporter/show/{id}', [AdminController::class, 'showExporter'])->name('admin.publicity.officer.pending.exporter.details');
    });

    Route::group(['prefix' => 'director-depm'], function () {
        Route::post('/pending-exporters-application-details-status/{id}', [ApplicationController::class, 'exporters_application_dir_depm_update'])->name('dir-depm.pending.application.update');
        Route::get('/applied-application', [ApplicationController::class, 'pending_exporters_applied_application_for_dir_depm'])->name('dir-depm.pending.applied.application');
        Route::get('/applied-application-details/{id}', [ApplicationController::class, 'pending_exporters_applied_application_for_dir_depm_details'])->name('dir-depm.pending.applied.application.details');
        Route::post('/applied-application-details/{id}', [ApplicationController::class, 'pending_exporters_applied_application_for_dir_depm_details_update'])->name('dir-depm.pending.applied.application.details.update');
    });

    Route::group(['prefix' => 'spl-sectry'], function () {
        Route::post('/pending-exporters-application-details-status/{id}', [ApplicationController::class, 'exporters_application_spl_sectry_update'])->name('spl-sectry.pending.application.update');
    });

    Route::group(['prefix' => 'dept-sectry'], function () {
        Route::get('/applied-application', [ApplicationController::class, 'pending_exporters_applied_application_for_dept_sect'])->name('dept-sectry.pending.applied.application');
        Route::post('/pending-exporters-application-details-status/{id}', [ApplicationController::class, 'exporters_application_dept_sectry_update'])->name('dept-sectry.pending.application.update');
        Route::get('/applied-application-details/{id}', [ApplicationController::class, 'pending_exporters_applied_application_for_dept_sect_details'])->name('dept-sectry.pending.applied.application.details');
        Route::post('/applied-application-details/{id}', [ApplicationController::class, 'pending_exporters_applied_application_for_dept_sect_details_update'])->name('dept-sectry.pending.applied.application.details.update');
    });

    Route::group(['prefix' => 'ddo'], function () {
        Route::post('/pending-exporters-application-details-status/{id}', [ApplicationController::class, 'exporters_application_ddo_update'])->name('ddo.pending.application.update');
    });
});
