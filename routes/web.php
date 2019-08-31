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

    //ROUTE PLAYER
    Route::get('/player/master-player', 'adminController@masterPlayer');
    Route::get('/player/master-player/add-data', 'adminController@addDataMasterPlayer');
    Route::post('/player/master-player/add-data', 'adminController@storeDataMasterPlayer')->name('storePlayer');
    Route::get('/player/master-player/edit-data/{id}', 'adminController@getEditDataMasterPlayer');
    Route::post('/player/master-player/edit-data/{id}', 'adminController@editDataMasterPlayer')->name('editPlayer');
    Route::get('/player/master-player/delete/{id}', 'adminController@deletePlayer');

    //ROUTE LAYOUT
    Route::get('/player/master-layout', 'adminController@masterLayout');
    Route::get('/player/master-layout/add-data', 'adminController@addDataMasterLayout');
    Route::post('/player/master-layout/add-data', 'adminController@storeDataMasterLayout')->name('storeLayout');
    Route::get('/player/master-layout/edit-data/{id}', 'adminController@getEditDataMasterLayout');
    Route::post('/player/master-layout/edit-data/{id}', 'adminController@editDataMasterLayout')->name('editLayout');
    Route::get('/player/delete/master-layout/{id}', 'adminController@deleteLayout');

    //ROUTE KATEGORI
    Route::get('/player/master-kategori', 'adminController@masterKategori');
    Route::get('/player/master-kategori/add-data', 'adminController@addDataMasterKategori');
    Route::post('/player/master-kategori/add-data', 'adminController@storeDataMasterKategori')->name('storeKategori');
    Route::get('/player/master-kategori/edit-data/{id}', 'adminController@getEditDataMasterKategori');
    Route::post('/player/master-kategori/edit-data/{id}', 'adminController@editDataMasterKategori')->name('editKategori');
    Route::get('/player/delete/master-kategori/{id}', 'adminController@deleteKategori');

    //ROUTE MEDIA / FILE MANAGER
    Route::get('/player/master-media', 'adminController@masterMedia');

    Route::get('/client/list-client', 'adminController@listClient');

    Route::get('/client/master-afiliasi', 'adminController@masterAfiliasi');

    Route::get('/client/setup-playlist', 'adminController@setupPlaylist');

    Route::get('/client/setup-paket', 'adminController@setupPaket');

    Route::get('/invoice/pesanan-tayang', 'adminController@pesananTayang');

    Route::get('/invoice/konfirmasi-pembayaran', 'adminController@konfirmasiPemabayaran');

    Route::get('/invoice/konfirmasi-withdraw', 'adminController@konfirmasiWithdraw');

    Route::get('/invoice/request-player', 'adminController@daftarRequestPlayer');

    Route::get('/invoice/riwayat-pesanan', 'adminController@riwayatPesanan');

});

Route::prefix('user')->middleware('auth')->group(function() {

    Route::get('/', 'UserController@homepage');
    Route::get('/paket-aktif', 'UserController@paketAktif');
    Route::get('/afiliasi/list-afiliasi', 'pageController@listAfiliasi');
    Route::get('/afiliasi/withdraw-afiliasi', 'pageController@withdraw');
    Route::get('/afiliasi/riwayat-afiliasi', 'pageController@riwayat');
    Route::get('/pesan', 'pageController@pesan');
    Route::get('/paket-aktif/upload', 'pageController@upload');
    Route::get('/paket-aktif/upload-bukti-pembayaran', 'pageController@uploadBP');
});


