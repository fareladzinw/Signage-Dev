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
Route::get('/', 'pageController@login');
Route::get('/sign-up', 'pageController@signUp');
Route::get('/aktivasi', 'pageController@aktivasi');
Route::get('/admin', 'pageController@indexAdmin');
Route::get('/admin/player/master-player', 'pageController@masterPlayer');
Route::get('/admin/player/master-player/add-data', 'pageController@addDataMaster');
Route::get('/admin/client/list-client', 'pageController@listClient');
Route::get('/user', 'pageController@indexUser');
Route::get('/user/paket-aktif', 'pageController@paketAktif');
Route::get('/user/afiliasi/list-afiliasi', 'pageController@listAfiliasi');
Route::get('/user/afiliasi/withdraw-afiliasi', 'pageController@withdraw');
Route::get('/user/afiliasi/riwayat-afiliasi', 'pageController@riwayat');


