<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/','/login');
Auth::routes(['verify' => true]);

Route::get('/login/{proveedor}',"Auth\LoginController@loginProveedorRedirect")->name('login.proveedor.callback');
Route::get('/login/{proveedor}/callback',"Auth\LoginController@loginProveedorCallback");

Route::get('/social/{proveedor}/callback',"Auth\SocialController@callbackSocial");

Route::get('/register/{proveedor}',"Auth\RegisterController@registerWithProveedorRedirect")->name('register.proveedor.redirect');
Route::get('/register/{proveedor}/callback',"Auth\RegisterController@registerWithProveedorCallback");

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function(){
    Route::prefix('agendamientos')->name('agendamientos.')->group(function(){
        Route::get('','AgendamientosController@index')->name('index');
        Route::get('create','AgendamientosController@create')->name('create');
        Route::post('','AgendamientosController@store')->name('store');
        Route::get('{agendamientoId}/pagar','AgendamientosController@handleRedirectPayment');
        Route::get('payment/accept','AgendamientosController@handleCapturePayment')->name('accept');
        Route::get('payment/cancelled','AgendamientosController@handlePaymentCancelled')->name('cancelled');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('login','Auth\LoginController@showLoginAdmin')->name('login');
    Route::post('login','Auth\LoginController@handleLoginAdmin');
    Route::get('register','Auth\RegisterController@showFormAdmin')->name('register');
    Route::post('register','Auth\RegisterController@registerEmpleado');
    Route::middleware('auth:empleados')->group(function(){
        Route::get('home','HomeAdminController@index')->name('home');
        Route::prefix('agendamientos')->name('agendamientos.')->group(function(){
            Route::get('','AgendamientosController@index')->name('index');
            Route::get('create','AgendamientosController@create')->name('create');
            Route::post('','AgendamientosController@store')->name('store');
            Route::get('{agendamientoId}/pagar','AgendamientosController@handleRedirectPayment');
            Route::get('payment/accept','AgendamientosController@handleCapturePayment')->name('accept');
            Route::get('payment/cancelled','AgendamientosController@handlePaymentCancelled')->name('cancelled');
        });
        Route::prefix('usuarios')->name('usuarios.')->group(function(){
            Route::get('','UsersController@index')->name('index');
            Route::get('{user}/agendamientos','AgendamientosUsuariosController@index')->name('agendamientos.historial');
        });
        Route::prefix('servicios')->name('servicios.')->group(function(){
            Route::get('','ServiciosController@index')->name('index');
            Route::post('','ServiciosController@store')->name('store');
            Route::get('create','ServiciosController@create')->name('create');
            Route::get('{id}','ServiciosController@show')->name('show');
            Route::get('{servicio}/edit','ServiciosController@edit')->name('edit');
            Route::put('{servicio}','ServiciosController@update')->name('update');
            Route::delete('{servicio}','ServiciosController@destroy')->name('destroy');
        });
        Route::prefix('empleados')->name('empleados.')->group(function(){
            Route::get('','EmpleadosController@index')->name('index');
            Route::get('{empleado}/edit','EmpleadosController@edit')->name('edit');
            Route::put('{empleado}','EmpleadosController@update')->name('update');
        });
    });
});