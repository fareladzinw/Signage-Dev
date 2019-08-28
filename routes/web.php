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

Route::get('/login', 'AuthController@indexLogin')->name('login');
Route::post('/login', 'AuthController@checkLogin')->name('checkLogin');
Route::get('/register', 'AuthController@indexRegister')->name('register');
Route::post('/register', 'AuthController@postRegister')->name('postRegister');
Route::get('/activation', 'AuthController@indexActivation')->name('activation');
Route::post('/activation', 'AuthController@checkActivation')->name('checkActivation');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', 'pageController@indexAdmin');
    Route::get('/player/master-player', 'pageController@masterPlayer');
    Route::get('/player/master-layout', 'pageController@masterLayout');
    Route::get('/player/master-media', 'pageController@masterMedia');
    Route::get('/player/master-kategori', 'pageController@masterKategori');
    Route::get('/client/master-afiliasi', 'pageController@masterAfiliasi');
    Route::get('/client/list-client', 'pageController@listClient');
    Route::get('/client/setup-playlist', 'pageController@setupPlaylist');
    Route::get('/client/setup-paket', 'pageController@setupPaket');
    Route::get('/invoice/pesanan-tayang', 'pageController@pesananTayang');
    Route::get('/invoice/konfirmasi-pembayaran', 'pageController@konfirmasiPemabayaran');
    Route::get('/invoice/konfirmasi-withdraw', 'pageController@konfirmasiWithdraw');
    Route::get('/player/master-player/add-data', 'pageController@addDataMaster');
});

Route::prefix('user')->middleware('auth')->group(function() {

    Route::get('/', 'UserController@homepage');
    Route::get('/paket-aktif', 'UserController@paketAktif');
    Route::get('/afiliasi/list-afiliasi', 'pageController@listAfiliasi');
    Route::get('/afiliasi/withdraw-afiliasi', 'pageController@withdraw');
    Route::get('/afiliasi/riwayat-afiliasi', 'pageController@riwayat');
    Route::get('/pesan', 'pageController@pesan');
    Route::get('/paket-aktif/upload', 'pageController@upload');
});


