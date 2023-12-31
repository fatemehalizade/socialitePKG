<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/github', [SocialController::class,"redirect"]);

Route::get('/login/callback/github',[SocialController::class,"Callback"]);


Route::get('/login/google', [SocialController::class,"redirectGG"]);

Route::get('/login/callback/google',[SocialController::class,"CallbackGG"]);


Route::get('/login/yahoo', [SocialController::class,"redirectYH"]);

Route::get('/login/callback/yahoo',[SocialController::class,"CallbackYH"]);
