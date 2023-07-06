<?php

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

Auth::routes();

Route::group(["namespace" => "Admin", 'prefix' => 'admin'], function() {
    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
    });

    Route::group(['middleware' => ['auth:sanctum', 'admin']], function() {
        Route::get('{page}', [App\Http\Controllers\HomeController::class, 'index'])->name('admin')->where('page', '.*');
        Route::resource('/download', 'File\DownloadController')->only(['store','update','destroy']);
    });
});

Route::group(["namespace" => "Article"], function() {
    Route::get('/articles', 'IndexController')->name('article.index');
    Route::get('/articles/{article}', 'ShowController')->name('article.show');
});

Route::group(["namespace" => "Review"], function() {
    Route::get('/otzivi', 'IndexController')->name('review.index');
});



Route::get('/', 'City\IndexController')->name('main');
Route::get('/{city}/', 'City\ShowController')->name('city');
Route::get('/{city}/{category}', 'CategoryController')->name('category');
