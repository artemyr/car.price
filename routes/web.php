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

    Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::resource('/download', 'File\DownloadController')->only(['store','update','destroy']);
    Route::resource('/picture', 'File\PictureController')->only(['store','update','destroy']);

    Route::group(['prefix' => 'posts'], function() {
        Route::get('', 'PostController@index')->name('admin.post.index');
        Route::get('/create', 'PostController@create')->name('admin.post.create');
        Route::post('/create', 'PostController@store')->name('admin.post.store');
        Route::get('/{post}/edit', 'PostController@edit')->name('admin.post.edit');
        Route::delete('/{post}', 'PostController@destroy')->name('admin.post.destroy');
        Route::patch('/{post}', 'PostController@update')->name('admin.post.update');
    });

    Route::group(['prefix' => 'cities'], function() {
        Route::get('', 'CityController@index')->name('admin.city.index');
        Route::get('/create', 'CityController@create')->name('admin.city.create');
        Route::post('/create', 'CityController@store')->name('admin.city.store');
        Route::get('/{city}/edit', 'CityController@edit')->name('admin.city.edit');
        Route::delete('/{city}', 'CityController@destroy')->name('admin.city.destroy');
        Route::patch('/{city}', 'CityController@update')->name('admin.city.update');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('', 'CategoryController@index')->name('admin.category.index');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/create', 'CategoryController@store')->name('admin.category.store');
        Route::get('/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');
        Route::delete('/{category}', 'CategoryController@destroy')->name('admin.category.destroy');
        Route::patch('/{category}', 'CategoryController@update')->name('admin.category.update');
    });

    Route::group(['prefix' => 'articles'], function() {
        Route::get('', 'ArticleController@index')->name('admin.article.index');
        Route::get('/create', 'ArticleController@create')->name('admin.article.create');
        Route::post('/create', 'ArticleController@store')->name('admin.article.store');
        Route::get('/{article}/edit', 'ArticleController@edit')->name('admin.article.edit');
        Route::delete('/{article}', 'ArticleController@destroy')->name('admin.article.destroy');
        Route::patch('/{article}', 'ArticleController@update')->name('admin.article.update');
    });

    Route::group(['prefix' => 'reviews'], function() {
        Route::get('', 'ReviewController@index')->name('admin.review.index');
        Route::get('/create', 'ReviewController@create')->name('admin.review.create');
        Route::post('/create', 'ReviewController@store')->name('admin.review.store');
        Route::get('/{review}/edit', 'ReviewController@edit')->name('admin.review.edit');
        Route::delete('/{review}', 'ReviewController@destroy')->name('admin.review.destroy');
        Route::patch('/{review}', 'ReviewController@update')->name('admin.review.update');
    });
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
