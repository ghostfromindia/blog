<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\PageController;
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

Route::get('/',  [PageController::class,'home']);
Route::get('/author/{slug}',  [PageController::class,'authorDetails']);


Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google-login');
Route::get('auth/google/callback',  [LoginController::class,'handleGoogleCallback']);
Route::get('logout',  [LoginController::class,'logout'])->name('logout');

include 'admin.php';

Route::get('/{slug}',  [PageController::class,'blogDetails']);
