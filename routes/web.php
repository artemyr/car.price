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

Route::group(["namespace" => "Admin", 'prefix' => 'admin', 'middleware' => 'admin'], function() {

    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index')->where('page', '.*');
    Route::get('{page}', [App\Http\Controllers\HomeController::class, 'index'])->name('admin')->where('page', '.*');

    Route::resource('/download', 'File\DownloadController')->only(['store','update','destroy']);
    Route::resource('/picture', 'File\PictureController')->only(['store','update','destroy']);
});

Auth::routes();

Route::group(["namespace" => "Article"], function() {
    Route::get('/articles', 'IndexController')->name('article.index');
    Route::get('/articles/{article}', 'ShowController')->name('article.show');
});



Route::group(["namespace" => "Review"], function() {
    Route::get('/otzivi', 'IndexController')->name('review.index');
});

// last
Route::group(["namespace" => "City"], function() {
    Route::get('/{city}', 'ShowController')->name('current_city')->where('city', \App\Models\City::getAllCitySlugs());
    Route::get('/{city}/{category}', 'CategoryController')->name('city.category')->where('city', \App\Models\City::getAllCitySlugs());
    Route::get('/{city}/{category}/{post}', 'ShowPostController')->name('city.post.show')->where('city', \App\Models\City::getAllCitySlugs());
});

// last
Route::group(["namespace" => "Post"], function() {
    Route::get('/', 'IndexController')->name('main');
    Route::get('/{category}', 'CategoryController')->name('category');
    Route::get('/{category}/{post}', 'ShowController')->name('post.show');
});
