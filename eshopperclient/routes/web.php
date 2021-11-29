<?php

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

use App\Http\Controllers\HomeController;
// trang shop ok
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/weather',[HomeController::class, 'blog'])->name('weather');
Route::post('/search',[HomeController::class, 'search'])->name('search');
Route::get('/404',[HomeController::class, 'loi'])->name('loi');

Route::get('/category/{slug}/{id}',[
	'as'=>'category.product',
	'uses'=>'App\Http\Controllers\CategoryController@index'
]);
// showw cart
Route::get('/category/cart',[
	'as'=>'category.cart',
	'uses'=>'App\Http\Controllers\CartController@index'
]);
// Add cart
Route::get('/product/{id}',[
	'as'=>'product.add_cart',
	'uses'=>'App\Http\Controllers\CartController@addtocart'
]);
// Update cart
Route::get('/category/cart/update/{id}',[
	'as'=>'product.update_cart',
	'uses'=>'App\Http\Controllers\CartController@updatetocart'
]);

// delete
Route::get('/category/cart/delete/{id}',[
	'as'=>'product.delete_cart',
	'uses'=>'App\Http\Controllers\CartController@deletetocart'
]);
//select
Route::post('/delivery',[
	'as'=>'select_delivery',
	'uses'=>'App\Http\Controllers\CartController@select_delivery'
]);
Route::post('/delivery/insert',[
	'as'=>'insert_delivery',
	'uses'=>'App\Http\Controllers\CartController@insert_delivery'
]);
//checkout
// showw cart
Route::get('/checkout',[
	'as'=>'checkout',
	'uses'=>'App\Http\Controllers\CheckoutController@index'
]);
//delete
Route::get('/checkout/delete/{id}',[
	'as'=>'checkout.delete',
	'uses'=>'App\Http\Controllers\CheckoutController@delete'
]);

//login
Route::get('/login',[
	'as'=>'login',
	'uses'=>'App\Http\Controllers\LoginController@login'
]);
Route::post('/postlogin',[
	'as'=>'postlogin',
	'uses'=>'App\Http\Controllers\LoginController@postlogin'
]);
Route::get('/logout',[
	'as'=>'logout',
	'uses'=>'App\Http\Controllers\LoginController@logout'
]);
Route::get('/register',[
	'as'=>'register',
	'uses'=>'App\Http\Controllers\LoginController@register'
]);
Route::post('/postregister',[
	'as'=>'postregister',
	'uses'=>'App\Http\Controllers\LoginController@postregister'
]);

//wishlist
Route::get('/wishlist/list',[
	'as'=>'wishlist.list',
	'uses'=>'App\Http\Controllers\WishlistController@list'
]);

Route::get('/wishlist/{id}',[
	'as'=>'wishlist',
	'uses'=>'App\Http\Controllers\WishlistController@addwishlist'
]);

