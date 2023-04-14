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
});
