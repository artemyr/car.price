<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["namespace" => "Admin", 'prefix' => 'admin',
//    'middleware' => 'admin'
], function() {

    Route::group(['prefix' => 'cities'], function() {
        Route::get('/', 'CityController@index')->name('admin.city.index');
        Route::get('/{city}', 'CityController@show')->name('admin.city.show');
        Route::post('/', 'CityController@store')->name('admin.city.store');
        Route::delete('/{city}', 'CityController@destroy')->name('admin.city.destroy');
        Route::patch('/{city}', 'CityController@update')->name('admin.city.update');
    });

    Route::group(['prefix' => 'articles'], function() {
        Route::get('/', 'ArticleController@index')->name('admin.article.index');
        Route::get('/{article}', 'ArticleController@show')->name('admin.article.show');
        Route::post('/', 'ArticleController@store')->name('admin.article.store');
        Route::delete('/{article}', 'ArticleController@destroy')->name('admin.article.destroy');
        Route::patch('/{article}', 'ArticleController@update')->name('admin.article.update');
    });

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', 'PostController@index')->name('admin.post.index');
        Route::get('/{post}', 'PostController@show')->name('admin.post.show');
        Route::post('/', 'PostController@store')->name('admin.post.store');
        Route::delete('/{post}', 'PostController@destroy')->name('admin.post.destroy');
        Route::patch('/{post}', 'PostController@update')->name('admin.post.update');
    });

    Route::group(['prefix' => 'reviews'], function() {
        Route::get('/', 'ReviewController@index')->name('admin.review.index');
        Route::get('/{review}', 'ReviewController@show')->name('admin.review.show');
        Route::post('/', 'ReviewController@store')->name('admin.review.store');
        Route::delete('/{review}', 'ReviewController@destroy')->name('admin.review.destroy');
        Route::patch('/{review}', 'ReviewController@update')->name('admin.review.update');
    });

     Route::group(['prefix' => 'categories'], function() {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::get('/{category}', 'CategoryController@show')->name('admin.category.show');
        Route::post('/', 'CategoryController@store')->name('admin.category.store');
        Route::delete('/{category}', 'CategoryController@destroy')->name('admin.category.destroy');
        Route::patch('/{category}', 'CategoryController@update')->name('admin.category.update');
    });

});
