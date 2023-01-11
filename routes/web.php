<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Auth::routes();

    Route::group([
        'prefix' => 'dashboard',
        'middleware' => ['auth']], function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard.home');

        /** Start route users **/
        Route::resource('users', UserController::class); 
        /** End route users **/

        /** Start route roles **/
        Route::resource('roles', RoleController::class)->except(['show']); 
        /** End route roles **/

        /** Start route categories **/
        Route::resource('categories', CategoryController::class)->except(['show']);

        Route::get('categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::delete('categories/forceDelete/{id}/', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');  
        Route::get('categories/restore/{id}/', [CategoryController::class, 'restore'])->name('categories.restore'); 

        /** End route categories **/

        /** Start route products **/
        Route::resource('products', ProductController::class)->except(['show']); 
        /** End route products **/

        /** Start route settings **/
        Route::resource('settings', SettingsController::class)->except(['show']); 
        /** End route settings **/
    });
});
