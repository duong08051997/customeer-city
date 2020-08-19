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

Route::get('/register','AuthController@showFormRegister')->name('form.register');
Route::post('/register','AuthController@Register')->name('users.register');
Route::get('/','AuthController@showFormLogin')->name('login');
Route::post('login','AuthController@login')->name('users.login');
Route::get('/logout', 'AuthController@logout')->name('users.logout');
Route::prefix('customers')->group(function () {

//    Route::get('/login', 'LoginController@showLogin')->name('form.login');
//    Route::post('/login', 'LoginController@login')->name('user.login');

    Route::get('/index', 'CustomerController@index')->name('customers.index');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::post('/create', 'CustomerController@store')->name('customers.store');
    Route::get('/{id}/edit', 'CustomerController@edit')->name('customers.edit');
    Route::post('/{id}/edit', 'CustomerController@update')->name('customers.update');
    Route::get('/{id}/delete', 'CustomerController@delete')->name('customers.delete');
    Route::get('/filter', 'CustomerController@filterByCity')->name('customers.filterByCity');
    Route::get('/search', 'CustomerController@search')->name('customers.search');
    Route::post('/{id}/filterCity','CustomerController@filterAjax');
});
Route::prefix('cities')->group(function () {
    Route::get('/', 'CityController@index')->name('cities.index');
    Route::get('/create', 'CityController@create')->name('cities.create');
    Route::post('/create', 'CityController@store')->name('cities.store');
    Route::get('/{id}/edit', 'CityController@edit')->name('cities.edit');
    Route::post('/{id}/edit', 'CityController@update')->name('cities.update');
    Route::get('/{id}/delete', 'CityController@delete')->name('cities.delete');
});

