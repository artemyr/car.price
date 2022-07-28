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

Route::get('/', 'MainController@index')->name('main');



Route::group(["namespace" => "Admin", 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::group(["namespace" => "Post", 'prefix' => 'posts'], function() {
        Route::get('', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/create', 'StoreController')->name('admin.post.store');

        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
    });
});


Route::group(["namespace" => "Post"], function() {
    Route::get('/{city}/posts', 'IndexController')->name('post.index');
    Route::get('/{city}/posts/{post}', 'ShowController')->name('post.show');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
