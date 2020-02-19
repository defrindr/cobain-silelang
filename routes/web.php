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
	return Redirect::to('/login');
});



// Route::get('/');

Route::get('/login','LoginController@formLogin')->name('auth.formLogin');
Route::post('/login','LoginController@login')->name('auth.postLogin');
Route::post('/logout','LoginController@logout')->name('auth.logout');


Route::resource('level','LevelController');
Route::resource('masyarakat','MasyarakatController');
Route::resource('petugas','PetugasController');
Route::resource('barang','BarangController');
Route::resource('lelang','LelangController');
Route::resource('history-lelang','HistoryLelangController');



Route::get('lelang/{lelang}/penawaran','LelangController@penawaran')->name('lelang.penawaran');
Route::post('lelang/{lelang}/penawaran','LelangController@penawaranStore')->name('lelang.penawaranStore');

Route::post('/lelang/{lelang}/tutup','LelangController@tutup')->name('lelang.tutup');



