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

// Home
Route::get('/', function () {
    return view('home');
});

// Login
Route::get('/login', 'AuthController@login');
Route::post('/postLogin', 'AuthController@postLogin');

// Logout
Route::get('/logout', 'AuthController@logout');

// Category
Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');
Route::delete('/category/{category}', 'CategoryController@destroy');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::patch('/category/{category}', 'CategoryController@update');

// Book
Route::get('/book', 'BookController@index');
Route::post('/book', 'BookController@store');
Route::delete('/book/{book}', 'BookController@destroy');
Route::get('/book/{book}/edit', 'BookController@edit');
Route::patch('/book/{book}', 'BookController@update');