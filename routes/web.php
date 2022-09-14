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
    Route::group(["namespace" => "Post", 'prefix' => 'posts'], function() {
        Route::get('', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/create', 'StoreController')->name('admin.post.store');

        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
    });

    Route::group(["namespace" => "City", 'prefix' => 'cities'], function() {
        Route::get('', 'IndexController')->name('admin.city.index');
        // Route::get('/create', 'CreateController')->name('admin.city.create');
        // Route::post('/create', 'StoreController')->name('admin.city.store');

        Route::get('/{city}/edit', 'EditController')->name('admin.city.edit');
        Route::get('/{city}', 'ShowController')->name('admin.city.show');
        // Route::delete('/{city}', 'DestroyController')->name('admin.city.destroy');
        Route::patch('/{city}', 'UpdateController')->name('admin.city.update');
    });

    Route::group(["namespace" => "Category", 'prefix' => 'categories'], function() {
        Route::get('', 'IndexController')->name('admin.category.index');
         Route::get('/create', 'CreateController')->name('admin.category.create');
        // Route::post('/create', 'StoreController')->name('admin.category.store');

        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        // Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
    });
});


// Route::group(["namespace" => "Post"], function() {
//     Route::get('/{city}/posts', 'IndexController')->name('post.index');
//     Route::get('/{city}/posts/{post}', 'ShowController')->name('post.show');
// });


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(["namespace" => "Article"], function() {
    Route::get('/articles', 'IndexController')->name('article.index');
    Route::get('/articles/{article}', 'ShowController')->name('article.show');
});



Route::group(["namespace" => "Review"], function() {
    Route::get('/otzivi', 'IndexController')->name('review.index');
});




// last
Route::group(["namespace" => "City"], function() {
    Route::get('/', 'IndexController')->name('main');
    Route::get('/{city}', 'ShowController')->name('current_city');
});
Route::group(["namespace" => "Post"], function() {
    Route::get('/{city}/{category}', 'CategoryController')->name('category');
    Route::get('/{city}/{category}/{post}', 'ShowController')->name('post.show');
});
