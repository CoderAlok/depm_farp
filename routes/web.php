<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::get('/exporter-register', [TblExportersController::class, 'create'])->name('exporter.register');

// All the routes for exporters
Route::group(['prefix' => 'exporters'], function () {
    Route::get('/show/{id}', [TblExportersController::class, 'show'])->name('exporter.details');
    Route::post('/login', [TblExportersController::class, 'login'])->name('exporter.login');
    // Route::get('/register', [TblExportersController::class, 'create'])->name('exporter.register');
    Route::post('/register', [TblExportersController::class, 'store'])->name('exporter.register.create');
    Route::post('/check-user-name', [TblExportersController::class, 'checkUserName'])->name('exporter.check.username');

    Route::group(['prefix' => 'applications'], function () {
        Route::get('/annexure-1', [TblExportersController::class, 'annexure1'])->name('exporter.application.annexure1');
        Route::get('/annexure-2', [TblExportersController::class, 'annexure2'])->name('exporter.application.annexure2');
    });

    Route::group([], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('exporter.home');
        Route::get('/list', [TblExportersController::class, 'index'])->name('exporters.list');
    });
});

// All the routes for Departmental Users
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [AdminController::class, 'roles'])->name('admin.roles');
        Route::post('/', [AdminController::class, 'add_roles'])->name('admin.roles.add');
        Route::get('/roles-check', [AdminController::class, 'roles_check'])->name('admin.roles.check');
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

    Route::group(['prefix' => 'publicity-officer'], function () {
        Route::get('/pending-exporters', [AdminController::class, 'pending_exporters'])->name('admin.publicity.officer.pending.exporters');
        Route::post('/update-pending-exporters-status', [AdminController::class, 'update_pending_exporters_status'])->name('admin.publicity.officer.pending.exporters.status');
    });
});
