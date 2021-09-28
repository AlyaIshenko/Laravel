<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('products', 'ProductsController@index')->name('products');
Route::get('products/{id}', 'ProductsController@show')->name('products.show');

Route::get('categories', 'CategoriesController@index')->name('categories');
Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');

// account/orders/5
Route::namespace('Account')->prefix('account')->name('account.')->middleware(['auth'])->group(function () {
    Route::get('/', 'AccountController@index');
    Route::get('/{account}/edit', 'AccountController@edit')->name('.edit');
    Route::put('/{account}/update', 'AccountController@update')->name('.update');
});

// admin/products/create 
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'BoardController')->name('home'); //admin.home

    Route::name('orders')->group(function () {
        Route::get('orders', 'OrdersController@index');
        Route::get('orders/{orders}/edit', 'OrdersController@edit')->name('.edit');
    });

    Route::name('products')->group(function () {
        Route::get('products', 'ProductsController@index');
        Route::get('products/{product}/edit', 'ProductsController@edit')->name('.edit');
        Route::put('products/{product}/update', 'ProductsController@update')->name('.update');
        Route::delete('products/{product}', 'ProductsController@destroy')->name('.delete');
    });
    // Route::name('categories')->group(function () {
    // Route::name('users')->group(function () {

});
