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

Route::post('/storage/store', 'StorageController@store')->name('storage.store');

Route::get('/api/facilities',  'Api\FacilitiesController@index');
