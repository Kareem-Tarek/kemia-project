<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes();

        Route::group(
            [
                'prefix' => 'dashboard',
                'middleware' => ['auth'],
            ],

            function () {
                Route::get('/', [HomeController::class, 'index'])->name('dashboard.home');

                /** Start Route Users **/
                Route::resource('users', UserController::class);
                /** End Route Users **/

                /** Start Route Roles **/
                Route::resource('roles', RoleController::class)->except(['show']);
                /** End Route Roles **/

                /** Start Route Categories **/
                Route::resource('categories', CategoryController::class)->except(['show']);
                /** End Route Categories **/

                /** Start Route Products **/
                Route::resource('products', ProductController::class)->except(['show']);
                /** End Route Products **/
            }

        );
    }
);
