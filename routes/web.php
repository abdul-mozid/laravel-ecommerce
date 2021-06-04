<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', function () {
    return view('login');
});
Route::get('/adminLogin', function () {
    return view('adminLogin');
});
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'userRegistration']);
Route::post('/adminLogin', [UserController::class, 'adminLogin']);
Route::get('/logout', function () {
    session()->forget('user');
    session()->forget('adminUser');
    return redirect('/');
});
Route::get('/productDetails/{id}', [ProductController::class, 'details']);
Route::post('/search', [ProductController::class, 'search']);
Route::group(['middleware' => 'AuthenticateUser'], function() {
    Route::post('/addToCart', [ProductController::class, 'addToCart']);
    Route::get('/viewCart', [ProductController::class, 'viewCart']);
    Route::get('/removeCartProduct/{id}', [ProductController::class, 'removeCartProduct']);
    Route::get('/order', [OrderController::class, 'order']);
    Route::post('/confirmOrder', [OrderController::class, 'confirmOrder']);
    Route::get('/orderList', [OrderController::class, 'orderList']);
});
Route::group(['middleware' => 'AuthenticateAdminUser'], function() {
    Route::get('/adminDashboard', [AdminController::class, 'dashboard']);
    Route::get('/products', [AdminController::class, 'productList']);
    Route::get('/addProduct', [AdminController::class, 'addProduct']);
    Route::post('/addProduct', [AdminController::class, 'saveProduct']);
    Route::get('/editProduct/{id}', [AdminController::class, 'editProduct']);
    Route::post('updateProduct', [AdminController::class, 'updateProduct']);
    Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);
    Route::get('/users', [AdminController::class, 'userList']);
    Route::get('/addUser', [AdminController::class, 'addUser']);
    Route::post('/addUser', [AdminController::class, 'saveUser']);
    Route::get('/editUser/{id}', [AdminController::class, 'editUser']);
    Route::post('updateUser', [AdminController::class, 'updateUser']);
    Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser']);
    Route::get('/orders', [AdminController::class, 'orderList']);
    Route::get('/approveOrder/{id}', [AdminController::class, 'approveOrder']);
    Route::get('/approvePayment/{id}', [AdminController::class, 'approvePayment']);
});
Route::group(['middleware' => 'AuthenticateBothUser'], function() {
    Route::get('/orderDetails/{id}', [OrderController::class, 'orderDetails']);
});
