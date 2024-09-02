<?php

use App\Http\Controllers\BackEnd\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\ProductController;
use App\Http\Controllers\BackEnd\FilesController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\VendorController;
use App\Http\Controllers\BackEnd\BlogController;
use App\Http\Controllers\BackEnd\AuthorController;


Route::get('dashboard', [PageController::class, 'login'])->name('dashboard.login');
Route::get('reset-password', [UserController::class, 'reset'])->name('user.reset.password');
Route::get('change-password', [UserController::class, 'change'])->name('user.change.password');


Route::post('login', [UserController::class, 'login'])->name('user.login');
Route::post('reset-password', [UserController::class, 'resetAction'])->name('user.reset.password');
Route::post('save-password', [UserController::class, 'save'])->name('user.save.password');


Route::middleware(['isAdmin'])->group(function () {
    Route::prefix('dashboard')->group(function (){
        Route::get('home', [PageController::class, 'home'])->name('admin.dashboard');



        Route::get('orders', [PageController::class, 'category'])->name('orders');
        Route::get('users', [PageController::class, 'subCategory'])->name('users');
        Route::get('promo', [PageController::class, 'subCategory'])->name('promo');
        Route::get('leads', [PageController::class, 'subCategory'])->name('leads');


        Route::prefix('category')->name('category.')->group(function (){
            Route::get('/', [CategoryController::class, 'home'])->name('home');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('/save', [CategoryController::class, 'save'])->name('save');
            Route::post('/update', [CategoryController::class, 'update'])->name('update');
            Route::get('/select2-search', [CategoryController::class, 'select2search'])->name(('select2search'));
            Route::post('/generate-slug', [CategoryController::class, 'generateSlug'])->name(('generate.slug'));
        });

        Route::prefix('product')->name('product.')->group(function (){
            Route::get('/', [ProductController::class, 'home'])->name('home');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('/save', [ProductController::class, 'save'])->name('save');
            Route::post('/update', [ProductController::class, 'update'])->name('update');
            Route::get('/select2-search', [ProductController::class, 'select2search'])->name(('select2search'));
            Route::post('/generate-slug', [ProductController::class, 'generateSlug'])->name(('generate.slug'));
        });

        Route::prefix('blogs')->name('blogs.')->group(function (){
            Route::get('/', [BlogController::class, 'home'])->name('home');
            Route::get('/create', [BlogController::class, 'create'])->name('create');
            Route::get('/create-child-for/{id}', [BlogController::class, 'createChild'])->name('create.child');
            Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
            Route::post('/save', [BlogController::class, 'save'])->name('save');
            Route::post('/update', [BlogController::class, 'update'])->name('update');
            Route::get('/select2-search', [BlogController::class, 'select2search'])->name(('select2search'));
            Route::post('/generate-slug', [BlogController::class, 'generateSlug'])->name(('generate.slug'));
        });

        Route::prefix('authors')->name('authors.')->group(function (){
            Route::get('/', [AuthorController::class, 'home'])->name('home');
            Route::get('/create', [AuthorController::class, 'create'])->name('create');
            Route::get('/create-child-for/{id}', [AuthorController::class, 'createChild'])->name('create.child');
            Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('edit');
            Route::post('/save', [AuthorController::class, 'save'])->name('save');
            Route::post('/update', [AuthorController::class, 'update'])->name('update');
            Route::get('/select2-search', [AuthorController::class, 'select2search'])->name(('select2search'));
            Route::post('/generate-slug', [AuthorController::class, 'generateSlug'])->name(('generate.slug'));
        });

        Route::prefix('user')->name('user.')->group(function (){
            Route::get('/', [UserController::class, 'home'])->name('home');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('/save', [UserController::class, 'save'])->name('save');
            Route::post('/update', [UserController::class, 'update'])->name('update');
            Route::get('/select2-search', [UserController::class, 'select2search'])->name(('select2search'));
            Route::post('/generate-slug', [UserController::class, 'generateSlug'])->name(('generate.slug'));
        });

        Route::prefix('file')->name('file.')->group(function (){

            Route::post('/upload', [FilesController::class, 'upload'])->name(('upload'));
        });


    });
});

Route::middleware(['isVendor'])->group(function () {
    Route::prefix('vendor')->group(function (){
        Route::get('dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
    });
});
