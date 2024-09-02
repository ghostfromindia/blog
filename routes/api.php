<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\UserController;
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

Route::post('login',[LoginController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('show');
        Route::get('/list', [UserController::class, 'list'])->name('list');
        Route::post('/', [UserController::class, 'create'])->name('create');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
    });

});
