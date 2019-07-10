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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pass', function () {
    return view('auth/passwords/reset');
});


Route::resource('/jenis', 'JenisController');
Route::resource('/barang', 'BarangController');

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function(){
	Route::get('/', 'HomeController@user')->name('petugas');
	Route::get('/edit/{id}', 'HomeController@edituser')->name('editpetugas');
	Route::get('/pass/{id}', 'HomeController@passuser')->name('passpetugas');
	Route::put('/pass/{id}', 'HomeController@pass')->name('passpet');
	Route::delete('/{id}', 'HomeController@hapuser')->name('hapuser');
	Route::put('/{id}', 'HomeController@updateuser')->name('updateuser');
});

Route::group(['middleware' => 'auth', 'prefix' => 'sembako'], function(){
	Route::match(['get', 'post'] , '/masuk', 'AksiBarangController@masuk')->name('barangmasuk');
	Route::match(['get', 'post'], '/keluar', 'AksiBarangController@keluar')->name('barangkeluar');
	Route::post('/store', 'AksiBarangController@store')->name('storeaksi');
	Route::get('/barang/{id}', 'AksiBarangController@barang')->name('barangcreate');
	Route::post('/input/{id}', 'AksiBarangController@banyak')->name('banyak');
	Route::post('/store/{id}', 'AksiBarangController@storebanyak')->name('storebanyak');
	Route::get('/input/{i}/{id}', 'AksiBarangController@create');
	Route::delete('/hapus/{i}/{id}', 'AksiBarangController@hapus');
});

Route::group(['middleware' => 'auth', 'prefix' => 'cetak'], function(){
	Route::match(['get', 'post'] , '/sembako', 'HomeController@datasembako')->name('cetaksem');
	Route::match(['get', 'post'] , '/barang', 'HomeController@databarang')->name('cetakbar');
	Route::match(['get', 'post'] , '/masuk', 'HomeController@datamasuk')->name('cetakmas');
	Route::match(['get', 'post'] , '/keluar', 'HomeController@datakeluar')->name('cetakkel');

	Route::get('/cetsembako/{id}', 'HomeController@cetaksembako');
	Route::get('/cetbarang/{id}', 'HomeController@cetakbarang')->name('cb');
	Route::get('/cetmasuk/{id}', 'HomeController@cetakmasuk')->name('cm');
	Route::get('/cetkeluar/{id}', 'HomeController@cetakkeluar')->name('ck');
});

Auth::routes();

