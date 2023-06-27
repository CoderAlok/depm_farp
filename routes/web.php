<?php

use App\Http\Controllers\Admin\AdminController;
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

// ----------------------------
Route::view('/login-test', 'login');
Route::view('/register-test', 'register');
// ----------------------------

// All the login routes
Auth::routes();
// Route::post('/login', [UsersController::class, 'userLogin'])->name('login');

// All the routes for exporters
Route::group(['prefix' => 'exporters'], function () {
    Route::post('/login', [TblExportersController::class, 'login'])->name('exporter.login');
    Route::get('/register', [TblExportersController::class, 'create'])->name('exporter.register');
    Route::post('/register', [TblExportersController::class, 'store'])->name('exporter.register.create');
    Route::post('/check-user-name', [TblExportersController::class, 'checkUserName'])->name('exporter.check.username');

    Route::group(['prefix' => 'applications'], function () {
        Route::get('/register', [TblExportersController::class, 'applicationRegister'])->name('exporter.application.register');
    });

    Route::group([], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('exporter.home');
        Route::get('/list', [TblExportersController::class, 'index'])->name('exporters.list');
    });
});

// All the routes for Departmental Users
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/roles', [AdminController::class, 'roles'])->name('admin.roles');
    Route::get('/roles-check', [AdminController::class, 'roles_check'])->name('admin.roles.check');
    Route::post('/roles', [AdminController::class, 'add_roles'])->name('admin.roles.add');
    Route::get('/user', [UsersController::class, 'users'])->name('admin.users');
    Route::post('/user', [UsersController::class, 'add_users'])->name('admin.users.add');
    Route::post('/show-user', [UsersController::class, 'show_user'])->name('admin.users.show');
    Route::post('/edit-user', [UsersController::class, 'edit_users'])->name('admin.users.edit');
});
