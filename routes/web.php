<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//user routes..
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'adminAuth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//admin routes..
Route::middleware(['adminAuth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin-dashboard');

    /* Users */
    Route::get('/admin/users', [UserController::class, 'viewUsers'])->name('users'); //User listing
    Route::get('/admin/create-user', [UserController::class, 'create'])->name('create-user'); // Create New User
});
