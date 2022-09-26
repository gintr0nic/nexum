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

//Rotta per la home
Route::get('/', function () {
    return view('welcome');
})->name('home');

//Rotte per il login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

//Rotta per il logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Rotte per la registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Rotte per il profilo
Route::get('user/{username}', 'UserController@index')->name('user');
Route::get('edit', 'UserController@showEditForm')->name('edit');
Route::post('edit', 'UserController@edit');
