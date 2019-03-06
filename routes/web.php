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
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
      
    Route::resource('po', 'PoController');
    Route::resource('barang', 'BarangController');
    Route::resource('spk', 'SpkController');
    Route::resource('laporan', 'LaporanController');
    Route::resource('invoice', 'invoiceController');
    Route::get('profile/password', 'ProfileController@password');
    Route::resource('profile', 'ProfileController');
    Route::resource('akun', 'akunController');
    Route::resource('buyer', 'BuyerController');
    
});


Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');




