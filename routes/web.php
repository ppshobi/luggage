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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/partner/dashboard', 'PartnerDashboardController@index')->name('partner.dashboard');
Route::get('/customer/dashboard', 'CustomerDashboardController@index')->name('customer.dashboard');

Route::get('/booking', 'BookingController@index')->name('booking.index');
Route::get('booking/create','BookingController@create')->name('booking.create');
Route::post('booking/store','BookingController@store')->name('booking.store');
Route::get('booking/{booking}/verify','BookingController@verify')->name('booking.verify');
Route::post('booking/{booking}/verify','BookingController@confirm')->name('booking.confirm');

Route::get('/customer/myvouchers', 'CustomerDashboardController@vouchers')->name('customer.vouchers');

Route::post('/storage/store', 'StorageController@store')->name('storage.store');

Route::get('/api/facilities',  'Api\FacilitiesController@index');
