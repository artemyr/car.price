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
        Route::get('/{post}', 'ShowController')->name('admin.post.show');

        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');

        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/create', 'StoreController')->name('admin.post.store');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
    });
});


Route::group(["namespace" => "Post"], function() {
    
    // Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/{city}/posts', 'IndexController')->name('post.index');
    Route::get('/{city}/posts/{post}', 'ShowController')->name('post.show');

    // Route::get('/posts/create', 'CreateController')->name('post.create');
    // Route::post('/posts/create', 'StoreController')->name('post.store');
    // Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    // Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    // Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
