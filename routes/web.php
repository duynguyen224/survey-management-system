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
        Route::get("/reset-password", "showResetPassword")->name('auth.showResetPassword')->withoutMiddleware('auth');
        Route::post("/reset-password", "resetPassword")->name('auth.resetPassword')->withoutMiddleware('auth');
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
                Route::post('/create-or-update/{id}', 'createOrUpdate')->name('engineers.createOrUpdate');
                Route::post('/send-survey-in-bulk', 'sendSurveyInBulk')->name('engineers.sendSurveyInBulk');
                Route::delete('/destroy', 'destroy')->name('engineers.destroy');
            });
        });

        Route::controller(CompanyController::class)->group(function () {
            Route::group(['prefix' => 'companies'], function () {
                Route::get('/', 'index')->name('companies.index');
                Route::get('/create', 'create')->name('companies.create');
                Route::post('/', 'store')->name('companies.store');
                Route::get('/{company}/edit', 'edit')->name('companies.edit');
                Route::put('/{company}', 'update')->name('companies.update');

                Route::delete('/destroy', 'destroy')->name('companies.destroy');
            });
        });

        Route::controller(SurveyController::class)->group(function () {
            Route::group(['prefix' => 'surveys'], function () {
                Route::get('/', 'index')->name('surveys.index');
                Route::get('/create', 'create')->name('surveys.create');
                Route::get('/{survey}', 'show')->name('surveys.show');
                Route::get('/{survey}/edit', 'edit')->name('surveys.edit');
                Route::post('/create-or-update/{id}', 'createOrUpdate')->name('surveys.createOrUpdate');
                Route::delete('/{survey}', 'destroy')->name('surveys.destroy');
            });
        });

        Route::controller(UserController::class)->group(function () {
            Route::group(['prefix' => 'users'], function () {
                Route::get('/', 'index')->name('users.index');
                Route::post('/create-or-update/{id}', 'createOrUpdate')->name('users.createOrUpdate');
                Route::delete('/destroy', 'destroy')->name('users.destroy');
            });

            Route::get('/me/change-password-form', 'showChangePassword')->name('users.show-change-password');
            Route::post('/me/change-password', 'changePassword')->name('users.change-password');
        });

        Route::controller(SampleController::class)->group(function () {
            Route::group(['prefix' => 'sample'], function () {
                Route::get('/', 'index')->name('sample.index');
                Route::get('/create', 'create')->name('sample.create');
            });
        });
    });
});
