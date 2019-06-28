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

Route::match(['get', 'post'], '/', 'RegisterController@index' )->name('index'); // Landing page display

Route::match(['get', 'post'], '/register', 'RegisterController@register' )->name('register'); //Register Display

Route::match(['get', 'post'], '/login', 'RegisterController@login' )->name('login'); //Register Display

Route::match(['get', 'post'], '/check', 'RegisterController@check' )->name('check'); //Validate Register

Route::match(['get', 'post'], '/verify', 'RegisterController@verify' )->name('verify'); //Verifying Login

Route::match(['get', 'post'], '/mainpage', 'MainController@index' )->name('mainpage'); //Mainpage Redirection

Route::match(['get', 'post'], '/logout', 'MainController@logout' )->name('logout'); // Logout

Route::match(['get', 'post'], '/profile', 'MainController@profile' )->name('profile'); // Display Profile

Route::match(['get', 'post'], '/edit', 'MainController@edit' )->name('edit'); // Edit Profile

Route::match(['get', 'post'], '/editpass', 'MainController@editpass' )->name('editpass'); // Edit profile Password

Route::match(['get', 'post'], '/addproduct', 'MainController@addproduct' )->name('addproduct'); // Add product

Route::match(['get', 'post'], '/addprod', 'MainController@addprod' )->name('addprod');  // Add product Handler

Route::match(['get', 'post'], '/showproducts', 'MainController@showproducts' )->name('showproducts');  // Show product

Route::match(['get', 'post'], '/manageproduct', 'MainController@manageproduct' )->name('manageproduct');  // Manage product view

Route::match(['get', 'post'], '/prodmanager', 'MainController@prodmanager' )->name('prodmanager');  // Manage Product handler

Route::match(['get', 'post'], '/editproduct', 'MainController@editproduct' )->name('editproduct'); // Product value edit/ Delete

Route::match(['get', 'post'], '/editchecker', 'MainController@editchecker' )->name('editchecker'); // Product Edit Handler


