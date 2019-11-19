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

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home.index');

    Route::resource('licenses', 'Admin\LicenseController');

    Route::resource('packages', 'Admin\PackageController');

    Route::resource('users', 'Admin\UserController');

    Route::resource('roles', 'Admin\RoleController');

    Route::resource('transactions', 'Admin\TransactionController');

    Route::prefix('order')->group(function () {
        Route::get('/', 'OrderController@index')->name('order.index');
        Route::get('/{package}', 'OrderController@show')->name('order.show');
        Route::post('/', 'OrderController@store')->name('order.store');
        Route::patch('/{transaction}', 'OrderController@update')->name('order.update');
    });

    Route::prefix('history')->group(function () {
        Route::get('/', 'OrderController@history')->name('order.history');
        Route::get('/{transaction}', 'OrderController@showHistory')->name('order.history.show');
    });

    Route::prefix('customer')->group(function () {
        Route::get('/', 'MyCustomerController@index')->name('customer.index');
        Route::get('create', 'MyCustomerController@create')->name('customer.create');
        Route::post('/', 'MyCustomerController@store')->name('customer.store');
        Route::get('/{user}/edit', 'MyCustomerController@edit')->name('customer.edit');
        Route::get('/{user}', 'MyCustomerController@show')->name('customer.show');
        Route::patch('/{user}', 'MyCustomerController@update')->name('customer.update');
        Route::delete('/{user}', 'MyCustomerController@destroy')->name('customer.destroy');
    });

    Route::prefix('mylicense')->group(function () {
        Route::get('/', 'MyLicenseController@index')->name('mylicense.index');
        Route::get('/sold', 'MyLicenseController@index')->name('mylicense.sold');
        Route::get('/{license}', 'MyLicenseController@show')->name('mylicense.show');
    });

    Route::prefix('mypackage')->group(function () {
        Route::get('/', 'MyPackageController@index')->name('mypackage.index');
        Route::get('create', 'MyPackageController@create')->name('mypackage.create');
        Route::post('/', 'MyPackageController@store')->name('mypackage.store');
        Route::get('/{package}/edit', 'MyPackageController@edit')->name('mypackage.edit');
        Route::get('/{package}', 'MyPackageController@show')->name('mypackage.show');
        Route::patch('/{package}', 'MyPackageController@update')->name('mypackage.update');
        Route::delete('/{package}', 'MyPackageController@destroy')->name('mypackage.destroy');
    });

    Route::prefix('mytransaction')->group(function () {
        Route::get('/', 'MyTransactionController@index')->name('mytransaction.index');
        Route::get('/{transaction}', 'MyTransactionController@show')->name('mytransaction.show');
        Route::patch('/{transaction}', 'MyTransactionController@update')->name('mytransaction.update');
    });

});