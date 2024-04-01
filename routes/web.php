<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


//Route::get('/login',[AuthController::class, 'loadLogin'])->name('login');
//Route::post('/login',[AuthController::class, 'login']);

Route::get('/register',[AuthController::class, 'loadRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register.post');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/',[ProductController::class, 'index'])->name('home');


//Route::middleware('auth')->group(function (){
 //   Route::get('/',[ProductController::class, 'index'])->name('home');

//});


Route::get('/detail/{id}/',[ProductController::class, 'detail'])->name('detail');
Route::get('/search',[ProductController::class, 'search'])->name('search');

Route::post('/add-to-cart',[ProductController::class,'addCart'])->name('add.cart');
Route::get('/cart-list',[ProductController::class,'cartList'])->name('cartList');
Route::get('/remove/{id}',[ProductController::class,'removeItem'])->name('remove');
Route::get('/order',[ProductController::class,'orderItem'])->name('order');
Route::post('/order-place',[ProductController::class,'orderPlace'])->name('orderPlace');
Route::get('/my-order',[ProductController::class,'myOrder'])->name('myOrders');



/******** Admin Middleware **************/
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/login',[AuthController::class, 'loadLogin'])->name('login');
    Route::post('/login',[AuthController::class, 'login']);
   // Route::get('/home',[ProductController::class, 'index'])->name('home');
    Route::get('/add',[AuthController::class, 'adloadRegister'])->name('ad-register')->name('add');
    Route::post('/add',[AuthController::class, 'adregister'])->name('ad-register.post');
});




/******** User Middleware **************/
Route::group(['prefix' => 'user','middleware'=>['web','isUser']],function(){
   Route::get('/login',[AuthController::class, 'loadLogin'])->name('userLogin');
   Route::post('/login',[AuthController::class, 'login']);
   Route::get('/home',[ProductController::class, 'index'])->name('home');
});
