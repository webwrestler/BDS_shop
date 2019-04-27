<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/category/{id}', 'HomeController@productsInCategory')->name('home.products.category');

Auth::routes();

Route::resource('categories', 'CategoryController')->parameters([
    'categories' => 'id'
]);

Route::resource('products', 'ProductController')->parameters([
    'products' => 'id'
]);