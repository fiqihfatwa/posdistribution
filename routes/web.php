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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home.index');

Route::get('/licenses/all', 'LicenseController@all')->name('licenses.all');
Route::resource('licenses', 'LicenseController');

Route::get('/packages/all', 'PackageController@all')->name('packages.all');
Route::resource('packages', 'PackageController');

Route::get('/users/all', 'UserController@all')->name('users.all');
Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::get('/transactions/all', 'TransactionController@all')->name('transactions.all');
Route::resource('transactions', 'TransactionController');

Route::get('/order', 'OrderController@index')->name('order.index');
Route::get('/order/{package}', 'OrderController@show')->name('order.show');
Route::get('/history', 'OrderController@history')->name('order.history');
Route::get('/history/{transaction}', 'OrderController@showHistory')->name('order.history.show');
