<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/{category}', 'ProductController@showCategory')->name('showCategory');
Route::get('/{category}/{product_id}', 'ProductController@show')->name('showProduct');
