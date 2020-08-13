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
Route::get('/',function ()
{
    return view('welcome');

});
Route::prefix('admin')->group(function () {

});
Route::prefix('customers')->group(function () {
    Route::get('/register','RegisterController@formRegister')->name('form.register');
    Route::post('/register','RegisterController@addUser')->name('user.create');
    Route::get('/login', 'LoginController@showLogin')->name('form.login');
    Route::post('/login', 'LoginController@login')->name('user.login');
    Route::get('/logout', 'LogoutController@logout')->name('user.logout');
    Route::get('/index', 'CustomerController@index')->name('customers.index');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::post('/create', 'CustomerController@store')->name('customers.store');
    Route::get('/{id}/edit', 'CustomerController@edit')->name('customers.edit');
    Route::post('/{id}/edit', 'CustomerController@update')->name('customers.update');
    Route::get('/{id}/delete', 'CustomerController@delete')->name('customers.delete');
    Route::get('/filter', 'CustomerController@filterByCity')->name('customers.filterByCity');
    Route::get('/search', 'CustomerController@search')->name('customers.search');
});
Route::prefix('cities')->group(function () {
    Route::get('/', 'CityController@index')->name('cities.index');
    Route::get('/create', 'CityController@create')->name('cities.create');
    Route::post('/create', 'CityController@store')->name('cities.store');
    Route::get('/{id}/edit', 'CityController@edit')->name('cities.edit');
    Route::post('/{id}/edit', 'CityController@update')->name('cities.update');
    Route::get('/{id}/delete', 'CityController@delete')->name('cities.delete');
});

