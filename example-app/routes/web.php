<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SettingController;

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

Route::get('/', [HomeController::class,'index']);

// account
Route::get('/login',[AccountController::class,'login']);
Route::post('/login',[AccountController::class,'signIn']);
Route::get('/register',[AccountController::class,'register']);
Route::post('/register',[AccountController::class,'signUp']);
Route::get('/logout',[AccountController::class,'logout']);


// manage

Route::prefix('admin')->middleware('checkUser')->group(function(){
    Route::get('/', [DashboardController::class,'index']);
    Route::get('/setting', [SettingController::class,'index']);
    Route::post('/setting', [SettingController::class,'submit']);

    Route::get('/portfolio',[PortfolioController::class,'index']);
    Route::get('/portfolio/create',[PortfolioController::class,'create']);
    Route::post('/portfolio/create',[PortfolioController::class,'store']);
    Route::get('/portfolio/edit/{id?}',[PortfolioController::class,'edit']);
    Route::post('/portfolio/edit/{id?}',[PortfolioController::class,'update']);
    Route::get('/portfolio/delete/{id?}',[PortfolioController::class,'destroy']);

    

});

