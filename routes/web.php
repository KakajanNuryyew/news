<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\User\NewsController as MyNewsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ImageController;

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

Route::get('/', [NewsController::class, 'index'])->name('news');  

Route::group(['prefix' => '/news'], function () {
    Route::get('/by-page', [NewsController::class, 'getByPage'])->name('news.by_page');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show');
});

Route::get('/images/{name}', [ImageController::class, 'show'])->name('images.show');

Auth::routes();

//my account routes
Route::group(['prefix' => '/my', 'middleware' => ['auth']], function () {
    Route::get('/password', [ProfileController::class, 'password'])->name('my.password');   
    Route::post('/password', [ProfileController::class, 'passwordUpdate'])->name('my.password.update');   
    
    Route::group(['prefix' => '/news'], function () {
        Route::get('/create', [MyNewsController::class, 'create'])->name('my.news.create');   
        Route::post('/create', [MyNewsController::class, 'store'])->name('my.news.store');   
    });
});

//admin routes 
Route::group(['prefix' => '/admin', 'middleware' => ['admin']], function () {

    Route::group(['prefix' => '/dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');   

    });

    Route::group(['prefix' => '/news'], function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('admin.news');    
        Route::get('/by-page', [AdminNewsController::class, 'getByPage'])->name('admin.news.by_page');
        Route::get('/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
        Route::post('/create', [AdminNewsController::class, 'store'])->name('admin.news.store'); 
        Route::get('/{id}', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
        Route::post('/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
        Route::get('/destroy/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');        
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users');    
        Route::get('/by-page', [UserController::class, 'getByPage'])->name('admin.users.by_page');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/create', [UserController::class, 'store'])->name('admin.users.store'); 
        Route::get('/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');        
    });

});

