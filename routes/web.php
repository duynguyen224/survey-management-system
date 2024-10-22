<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    // Auth
    Route::controller(AuthController::class)->group(function () {
        Route::group(['prefix', ''], function () {
            Route::get('/login', "index")->name('auth.login')->withoutMiddleware('auth');
            Route::post("/login", "login")->name('auth.authenticate');
        });
    });

    // Home
    Route::controller(HomeController::class)->group(function () {
        Route::group(['prefix', ''], function () {
            Route::get('/', "index")->name('home.index');
        });
    });

    // Admin
    Route::group(['prefix' => 'admin'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::group(['prefix', 'users'], function () {
                Route::get('/', 'index')->name('users.index');
                Route::get('/create', 'create')->name('users.create');
                Route::post('/', 'store')->name('users.store');
                Route::get('/{user}', 'show')->name('users.show');
                Route::get('/{user}/edit', 'edit')->name('users.edit');
                Route::put('/{user}', 'update')->name('users.update');
                Route::delete('/{user}', 'destroy')->name('users.destroy');
            });
        });
    });
});
