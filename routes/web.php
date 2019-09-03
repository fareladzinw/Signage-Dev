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
Route::get('/register/{afiliasi}', 'AuthController@indexRegisterWithAfiliasi')->name('registerAfiliasi');
Route::post('/register', 'AuthController@postRegister')->name('postRegister');
Route::get('/activation', 'AuthController@indexActivation')->name('activation');
Route::get('/activation/{afiliasi}', 'AuthController@indexActivationWithAfiliasi')->name('activationAfiliasi');
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

    //ROUTE CLIENT
    Route::get('/client/list-client', 'adminController@listClient');
    Route::get('/client/master-client/edit-data/{id}', 'adminController@getEditDataMasterClient');
    Route::post('/client/master-client/edit-data/{id}', 'adminController@editDataMasterClient')->name('editClient');
    Route::get('/client/delete/master-client/{id}', 'adminController@deleteClient');

    //ROUTE AFILIASI
    Route::get('/client/master-afiliasi', 'adminController@masterAfiliasi');

    //ROUTE PLAYLIST
    Route::get('/client/setup-playlist', 'adminController@setupPlaylist');
    Route::get('/client/master-playlist/add-data', 'adminController@addDataMasterPlaylist');
    Route::post('/client/master-playlist/add-data', 'adminController@storeDataMasterPlaylist')->name('storePlaylist');
    Route::get('/client/master-playlist/edit-data/{id}', 'adminController@getEditDataMasterPlaylist');
    Route::post('/client/master-playlist/edit-data/{id}', 'adminController@editDataMasterPlaylist')->name('editPlaylist');
    Route::get('/client/delete/master-playlist/{id}', 'adminController@deletePlaylist');

    //ROUTE PAKET
    Route::get('/client/setup-paket', 'adminController@setupPaket');
    Route::get('/client/master-paket/add-data', 'adminController@addDataMasterPaket');
    Route::post('/client/master-paket/add-data', 'adminController@storeDataMasterPaket')->name('storePaket');
    Route::get('/client/master-paket/edit-data/{id}', 'adminController@getEditDataMasterPaket');
    Route::post('/client/master-paket/edit-data/{id}', 'adminController@editDataMasterPaket')->name('editPaket');
    Route::get('/client/delete/master-paket/{id}', 'adminController@deletePaket');

    //ROUTE INVOICE
    Route::get('/invoice/pesanan-tayang', 'adminController@pesananTayang');
    Route::post('/invoice/pesanan-tayang/on/{id}', 'adminController@onPesananTayang');
    Route::post('/invoice/pesanan-tayang/off/{id}', 'adminController@offPesananTayang');

    Route::get('/invoice/konfirmasi-pembayaran', 'adminController@konfirmasiPemabayaran');
    Route::post('/invoice/konfirmasi-pembayaran/{id}', 'adminController@makeKonfirmasiPemabayaran')->name('konfirasiPembayaran');
    Route::post('/invoice/download-pembayaran/{id}', 'adminController@downloadKonfirmasiPemabayaran')->name('downloadPembayaran');

    Route::get('/invoice/konfirmasi-withdraw', 'adminController@konfirmasiWithdraw');
    Route::post('/invoice/konfirmasi-withdraw/{id}', 'adminController@makeKonfirmasiWithdraw')->name('konfirmasiWithdraw');

    Route::get('/invoice/request-player', 'adminController@daftarRequestPlayer');
    Route::post('/invoice/request-player/on/{id}', 'adminController@onRequestPlayer');
    Route::post('/invoice/request-player/off/{id}', 'adminController@offRequestPlayer');

    Route::get('/invoice/riwayat-pesanan', 'adminController@riwayatPesanan');

});

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/', 'UserController@homepage')->name('homepage');
    Route::get('/paket-aktif', 'UserController@paketAktif')->name('paket');
    Route::get('/afiliasi/list-afiliasi', 'UserController@listAfiliasi');
    Route::get('/afiliasi/withdraw-afiliasi', 'UserController@withdrawPage');
    Route::post('/afiliasi/withdraw-afiliasi', 'UserController@withdrawStore')->name('withdrawApproval');
    Route::get('/afiliasi/riwayat-withdraw', 'UserController@withdrawHistory')->name('withdrawHistory');
    Route::get('/pesan/{id}', 'UserController@pesanIndex')->name('pesan');
    Route::post('/pesan/{id}', 'UserController@pesanStore')->name('pesanStore');
    Route::get('/paket-aktif/upload/{id}', 'UserController@uploadIndex')->name('uploadIklan');
    Route::post('/paket-aktif/upload/{id}', 'UserController@uploadStore')->name('uploadStore');
    Route::get('/paket-aktif/upload-bukti-pembayaran/{id}', 'UserController@buktiIndex')->name('buktiIndex');
    Route::post('/paket-aktif/upload-bukti-pembayaran/{id}', 'UserController@buktiStore')->name('buktiStore');
});



