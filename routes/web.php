<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Dashboard;
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

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ---------------------- begin::Admin Route --------------------------------------------*/
Route::get('/login', Login::class)->name('login');


Route::middleware(['adminAuth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');//dashboard
    Route::get('/users', \App\Livewire\User\Index::class)->name('users');//users


    Route::get('/logout', Logout::class)->name('logout');//logout
});
/* ---------------------- end::Admin Route --------------------------------------------*/

