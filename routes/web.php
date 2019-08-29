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
    Route::get('/player/master-player', 'pageController@masterPlayer');
    Route::get('/client/list-client', 'pageController@listClient');
    Route::get('/player/master-player/add-data', 'pageController@addDataMaster');
});

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/', 'UserController@homepage')->name('homepage');
    Route::get('/paket-aktif', 'UserController@paketAktif');
    Route::get('/afiliasi/list-afiliasi', 'UserController@listAfiliasi');
    Route::get('/afiliasi/withdraw-afiliasi', 'UserController@withdrawPage');
    Route::post('/afiliasi/withdraw-afiliasi', 'UserController@withdrawStore')->name('withdrawApproval');
    Route::get('/afiliasi/riwayat-withdraw', 'UserController@withdrawHistory')->name('withdrawHistory');
});


