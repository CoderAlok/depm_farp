<?php

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
Route::group(['prefix' => 'users'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
});
