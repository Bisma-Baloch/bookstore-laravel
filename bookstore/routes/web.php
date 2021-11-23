<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('index',[PagesController::class, 'index']);
Route::get('about',[AboutController::class, 'index']);
Route::get('contact',[ContactController::class, 'index']);
Route::get('login',[UserController::class, 'index']);
Route::get('signup',[UserController::class, 'signin']);
Route::get('bookDetails',[BooksController::class, 'index']);
Route::get('cart',[CartController::class, 'index']);
Route::get('myorders',[orderController::class, 'order']);
Route::get('orderdetails',[orderController::class, 'index']);


