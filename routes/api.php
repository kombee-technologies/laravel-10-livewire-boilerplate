<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'v1',
    //'namespace' => 'API',
], function () {

    Route::post('login', '\App\Http\Controllers\LoginController@login'); //Login

    Route::group(['middleware' => ['auth:sanctum']],  function () {
        /* Users */
        Route::post('create-user', '\App\Http\Controllers\UsersController@store'); //Create User
        Route::get('logout', '\App\Http\Controllers\LoginController@logout'); //Logout
    });
});
