<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\RequestApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('API')->group(function () {
    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('register', [AuthApiController::class, 'register']);

    Route::middleware(['auth:api', 'accessToken'])->group(function () {
        Route::get('users/details', [AuthApiController::class, 'userDetails']);

        Route::post('posts/create', [PostApiController::class, 'create']);
        Route::get('posts/list', [PostApiController::class, 'list']);

        Route::post('requests/make', [RequestApiController::class, 'makeRequest']);
        Route::get('requests/list', [RequestApiController::class, 'list']);
    });
});
