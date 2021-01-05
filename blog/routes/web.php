<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/dashboard');
});


Auth::routes();

//Route::get('/login', 'AuthController@authenticate');

Route::get('/home', 'HomeController@index');

Route::get('dashboard', 'DashboardController@index');

// user  routes
Route::get('users', 'UserController@index')->name('users');
Route::get('users/create', 'UserController@create');
Route::post('users', 'UserController@store');
Route::get('users/{id}/edit','UserController@edit');
Route::patch('users/{id}','UserController@update');
Route::delete('users/{id}','UserController@destroy');
Route::post('users/filter','UserController@filter');
Route::post('users/details','UserController@details');

//
Route::get('academic', 'AcademicController@index');
Route::post('academic/history','AcademicController@history');
Route::post('academic','AcademicController@store');


// user group routes
Route::get('userGroup','UserGroupController@index');
Route::get('userGroup/create', 'UserGroupController@create');
Route::post('userGroup', 'UserGroupController@store');
Route::get('userGroup/{id}/edit','UserGroupController@edit');
Route::patch('userGroup/{id}','UserGroupController@update');
Route::delete('userGroup/{id}','UserGroupController@destroy');


// categories routes
Route::get('categories','CategoryController@index');
Route::get('categories/create','CategoryController@create');
Route::post('categories', 'CategoryController@store');
Route::get('categories/{id}/edit','CategoryController@edit');
Route::patch('categories/{id}','CategoryController@update');
Route::delete('categories/{id}','CategoryController@destroy');


// products routes
Route::get('products','ProductController@index');
Route::get('products/create','ProductController@create');
Route::post('products','ProductController@store');
Route::get('products/{id}/edit','ProductController@edit');
Route::patch('products/{id}','ProductController@update');
Route::delete('products/{id}','ProductController@destroy');


// user to product routes
Route::get('usertoproducts','UserToProductController@index');
Route::post('usertoproducts/productdetails','UserToProductController@details');
Route::post('usertoproducts','UserToProductController@store');


// product report routes
Route::get('productreport','ProductReportController@index');