<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
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
Route::post('/login', [UsersController::class, 'userLogin'])->name('login');

// All the routes for exporters
Route::group(['prefix' => 'exporters'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

// All the routes for Departmental Users
Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/roles', [AdminController::class, 'roles'])->name('admin.roles');
    Route::post('/roles', [AdminController::class, 'add_roles'])->name('admin.roles.add');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/users', [AdminController::class, 'add_users'])->name('admin.users.add');
});
