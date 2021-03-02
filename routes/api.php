<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::prefix('facturacion')->group(function(){
        Route::get('all','DatosFacturacionUsersController@allDatosFacturacionFromUser');
        Route::post('nuevo','DatosFacturacionUsersController@store');
    });
});
Route::get('/agendamientos/list','AgendamientosController@getAllFechasReservadas')->name('agendamientos.list');
Route::get('servicios','ServiciosController@indexApi');
Route::post('servicios/upload','ServiciosController@uploadFiles');