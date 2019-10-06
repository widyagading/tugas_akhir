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

Route::get('/satu', function () {
    return view('welcome');
});
Route::get('/beli', function () {
    return view('index');
});

Route::resource('/penjualan','Penjualan');
Route::resource('/barang','Barang');
Route::resource('/pembelian','Pembelian');

Route::get('login','Login@index');
Route::post('/login/cek','Login@cek');
Route::get('/logout','Login@logout');
