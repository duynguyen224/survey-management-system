<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    // Auth
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', "index")->name('auth.index')->withoutMiddleware('auth');
        Route::post("/login", "login")->name('auth.login')->withoutMiddleware('auth');
        Route::post("/logout", "logout")->name('auth.logout');
    });

    // Home
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', "index")->name('home.index');
    });

    // Admin management
    Route::group(['prefix' => 'admin'], function () {
        Route::controller(EngineerController::class)->group(function () {
            Route::group(['prefix' => 'engineers'], function () {
                Route::get('/', 'index')->name('engineers.index');
                Route::get('/create', 'create')->name('engineers.create');
                Route::post('/', 'store')->name('engineers.store');
                Route::get('/{engineer}', 'show')->name('engineers.show');
                Route::get('/{engineer}/edit', 'edit')->name('engineers.edit');
                Route::put('/{engineer}', 'update')->name('engineers.update');
                Route::delete('/{engineer}', 'destroy')->name('engineers.destroy');
            });
        });

        Route::controller(CompanyController::class)->group(function () {
            Route::group(['prefix' => 'companies'], function () {
                Route::get('/', 'index')->name('companies.index');
                Route::get('/create', 'create')->name('companies.create');
                Route::post('/', 'store')->name('companies.store');
                Route::get('/{company}', 'show')->name('companies.show');
                Route::get('/{company}/edit', 'edit')->name('companies.edit');
                Route::put('/{company}', 'update')->name('companies.update');
                Route::delete('/{company}', 'destroy')->name('companies.destroy');
            });
        });

        Route::controller(SurveyController::class)->group(function () {
            Route::group(['prefix' => 'surveys'], function () {
                Route::get('/', 'index')->name('surveys.index');
                Route::get('/create', 'create')->name('surveys.create');
                Route::post('/', 'store')->name('surveys.store');
                Route::get('/{survey}', 'show')->name('surveys.show');
                Route::get('/{survey}/edit', 'edit')->name('surveys.edit');
                Route::put('/{survey}', 'update')->name('surveys.update');
                Route::delete('/{survey}', 'destroy')->name('surveys.destroy');
            });
        });

        Route::controller(UserController::class)->group(function () {
            Route::group(['prefix' => 'users'], function () {
                Route::get('/', 'index')->name('users.index');
                Route::get('/create', 'create')->name('users.create');
                Route::post('/', 'store')->name('users.store');
                Route::get('/{user}', 'show')->name('users.show');
                Route::get('/{user}/edit', 'edit')->name('users.edit');
                Route::put('/{user}', 'update')->name('users.update');
                Route::delete('/{user}', 'destroy')->name('users.destroy');

                Route::get('/change-password', 'changePassword')->name('users.change-password');
            });
        });

        Route::controller(SampleController::class)->group(function () {
            Route::group(['prefix' => 'sample'], function () {
                Route::get('/', 'index')->name('sample.index');
                Route::get('/create', 'create')->name('sample.create');
            });
        });
    });
});
