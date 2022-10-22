<?php

use App\Http\Controllers\Admin\RequestAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/userrequests', [RequestAdminController::class, 'index'])->name('userrequests.index');
Route::get('/userrequests/{userrequest}/approval', [RequestAdminController::class, 'approval'])->name('userrequests.approval');

Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
