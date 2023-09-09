<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/cart', 'CartController@index')->name('cartIndex');
Route::get('/{alias}', 'ProductController@showCategory')->name('showCategory');
Route::get('/{category}/{product_id}', 'ProductController@show')->name('showProduct');
Route::post('/add-to-cart', 'CartController@addToCart')->name('addToCart');
