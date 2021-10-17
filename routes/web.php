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

// Route::get('products', 'ProductsController@index')->name('products');
// Route::get('products/{id}', 'ProductsController@show')->name('products.show');
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/{product}', 'ProductsController@show')->name('products.show');

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

    // Route::resource('users', 'UsersController')->names('users');
    // Route::resource('categories', 'CategoriesController')->names('categories')->except(['show', 'destroy']);
    // Route::resource('products', 'ProductsController')->names('product')->except('show');
    Route::name('products')->group(function () {
        Route::get('products', 'ProductsController@index');
        Route::get('products/create', 'ProductsController@create')->name('.create');
        Route::get('products/{product}/edit', 'ProductsController@edit')->name('.edit');
        Route::post('products', 'ProductsController@store')->name('.store');
        Route::put('products/{product}/update', 'ProductsController@update')->name('.update');
        Route::delete('products/{product}', 'ProductsController@destroy')->name('.destroy');
    });

    Route::name('categories')->group(function () {
        Route::get('categories', 'CategoriesController@index');
        Route::get('categories/create', 'CategoriesController@create')->name('.create');
        Route::get('categories/{category}/edit', 'CategoriesController@edit')->name('.edit');
        Route::post('categories', 'CategoriesController@store')->name('.store');
        Route::put('categories/{category}/update', 'CategoriesController@update')->name('.update');
        Route::delete('categories/{category}', 'CategoriesController@destroy')->name('.destroy');
    });

    Route::name('users')->group(function () {
        Route::get('users', 'UsersController@index');
        Route::get('users/{user}/show', 'UsersController@show')->name('.show');
        Route::get('users/{user}/create', 'UsersController@create')->name('.create');
        Route::get('users/{user}/edit', 'UsersController@edit')->name('.edit');
        Route::post('users/{user}/store', 'UsersController@store')->name('.store');
        Route::put('users/{user}/update', 'UsersController@update')->name('.update');
        Route::delete('users/{user}', 'UsersController@destroy')->name('.destroy');
    });
});
