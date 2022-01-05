<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\AuthorController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\SignupController;
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


Route::get('index',[BooksController::class, 'index'])->name('index');
Route::get('bookDetails/{id}',[BooksController::class, 'bookDetail'])->name('book-detail');
Route::get('category/{id}',[BooksController::class, 'category'])->name('category');

Route::get('signup',[SignupController::class, 'index'])->name('signup');
Route::post('signin',[SignupController::class, 'signupConfirm'])->name('signup-Confirm');

Route::get('login',[UserController::class, 'index'])->name('login');
Route::post('/login-confirm',[UserController::class, 'loginconfirm'])->name('login-confirm');
Route::get('logout',[UserController::class,'logout'])->name('logout');


Route::get('cart',[CartController::class, 'index'])->name('cart');
Route::post('cart/cart-add',[CartController::class,'addToCart'])->name('cart-add');
Route::post('cart/delete',[CartController::class,'deleteCart'])->name('delete');


Route::get('myorders',[orderController::class, 'order'])->name('my-orders');
Route::get('orderdetails/{id}',[orderController::class, 'index'])->name('order-detail');
Route::get('order_create',[orderController::class, 'orderCreate'])->name('create');


Route::get('about',[AboutController::class, 'index']);
Route::get('contact',[ContactController::class, 'index']);

// Admin Panel
Route::resource('books', BookController::class);

Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);
Route::get('admin/orders',[orderController::class, 'adminOrder'])->name('orders');
Route::get('admin/order/{id}',[orderController::class, 'adminOrderView'])->name('order');

