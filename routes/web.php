<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/{category}/{product_id}', 'ProductController@show')->name('showProduct');
