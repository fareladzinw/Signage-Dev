<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('call_player/{idPlayer}/{keyPlayer}', 'ApiController@getSetupPlayer');
Route::get('get_signage/{idPlayer}/{keyPlayer}/{idUnique}', 'ApiController@getDaftarIklan');
Route::get('download_content/{idPlayer}/{keyPlayer}', 'ApiController@getContentIklan');
Route::get('afiliasi/{idUser}', 'ApiController@getDaftarAfiliasiClient');
Route::post('withdraw/{idUser}', 'ApiController@postWithdrawAfiliasi');
Route::get('rekap_afiliasi/{idUser}/{tanggal}', 'ApiController@getRekapAfiliasi');
Route::post('set_afiliasi/{idUser}', 'ApiController@postRegAfiliasi');

