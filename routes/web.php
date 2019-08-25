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
    Route::get('/client/list-client', 'pageController@listClient');
});

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/', 'pageController@indexUser');
});




