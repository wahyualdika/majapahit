<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDataController;
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

Route::get('/login', [LoginController::class, 'getLoginPage'])->name('login.page');
Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/profile',[UserDataController::class,'getProfile'])->name('profile');
Route::get('/form_edit_profile',[UserDataController::class,'editProfileForm'])->name('edit_profile_form');
Route::get('/form_make_profile',[UserDataController::class,'makeProfileForm'])->name('make_profile_form');
Route::post('/make_profile',[UserDataController::class,'makeProfile'])->name('make_profile');
Route::post('/edit_profile',[UserDataController::class,'editProfile'])->name('edit_profile');
Route::get('/delete_profile',[UserDataController::class,'deleteProfile'])->name('delete_profile');
