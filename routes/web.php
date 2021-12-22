<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Routes;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\ApprovedController;
use App\Http\Controllers\Admin\ComplainController;
use App\Http\Controllers\Admin\AdminHomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'anti-gisa-ng-mga-panelist'], function(){
    Auth::routes(['verify' => true]);
    /**
      * User Routes
      */
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::middleware('auth')->group(function(){
        //User's Home Routes
        Route::post('/home/update', [App\Http\Controllers\HomeController::class, 'update']);
        //User's Complain Routes
        Route::get('/complaint', [App\Http\Controllers\ComplaintController::class, 'index'])->name('complaint');
        Route::post('/complaint',[App\Http\Controllers\ComplaintController::class, 'store']);
        //User's History Routes
        Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
        Route::get('/history/delete/{id}', [App\Http\Controllers\HistoryController::class, 'destroyIndia'])->name('delete');
    });
    /**
      * Admin Routes
      */
    Route::namespace('admin')->prefix('admin')->group( function(){
        Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
        Route::middleware('auth:admin')->group(function(){
            //Home Table Routes
            Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
            //Complain Table Routes
            Route::get('/complain', [App\Http\Controllers\Admin\ComplainController::class, 'index'])->name('admin.complain');
            Route::delete('/destroyIndia/{id}', [App\Http\Controllers\Admin\ComplainController::class, 'destroyIndia'])->name('destroyIndia');
            //Archive Table Routes
            Route::get('/archives', [App\Http\Controllers\Admin\ArchiveController::class, 'index'])->name('admin.archive');
            Route::get('/delete/{id}', [App\Http\Controllers\Admin\ArchiveController::class, 'destroy'])->name('delete');
            Route::get('/restore/{id}', [App\Http\Controllers\Admin\ArchiveController::class, 'restore'])->name('restore');
            Route::get('/deletes/', [App\Http\Controllers\Admin\ArchiveController::class, 'destroyAll'])->name('destroyAll');
            Route::get('/restores/', [App\Http\Controllers\Admin\ArchiveController::class, 'restoreAll'])->name('restoreAll');
            //Admin Table Routes
            Route::get('/info', [App\Http\Controllers\Admin\AdminHomeController::class, 'index'])->name('admin.admin');
            // Admin Logout Routes
            Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
        });
    });
});
//Pa$$w0rd!