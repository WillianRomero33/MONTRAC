<?php

use App\Http\Controllers\BodegaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VigilanciaController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\AduanaController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => ['role:Admin']], function () {
		Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    });
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	// Nuevas rutas para Vigilancia
	Route::group(['middleware' => ['role:Admin|Vigilancia']], function () {
		Route::get('vigilancia', [VigilanciaController::class, 'index'])->name('vigilancia.index');
		Route::post('vigilancia/confirmar/{id}', [VigilanciaController::class, 'confirmarIngreso'])->name('vigilancia.confirmarIngreso');
	});

	// Rutas bodega
	Route::group(['middleware' => ['role:Admin|Bodega']], function () {
		Route::get('bodega',[BodegaController::class, 'index'])->name('bodega.index');
		Route::get('/bodega/{id}/edit', [BodegaController::class, 'edit'])->name('bodega.edit');
		Route::get('/bodega/{id}/submit', [BodegaController::class, 'submit'])->name('bodega.submit');
	});

	// Rutas Import
	Route::group(['middleware' => ['role:Admin|Import']], function () {
		Route::resource('import', ImportController::class)
			->only(['index', 'create', 'store', 'report', 'edit', 'update', 'destroy', 'submit'])
			->names([
				'index' => 'imports.index',
				'create' => 'imports.create',
				'store' => 'imports.store',
				'report' => 'imports.report',
				'edit' => 'imports.edit',
				'update' => 'imports.update',
				'destroy' => 'imports.destroy',
				'submit' => 'imports.submit',
		]);
		Route::get('import/submit/{id}', [ImportController::class, 'submit'])->name('imports.submit');
		Route::get('import/report', [ImportController::class, 'report'])->name('imports.report');
	});

	// Rutas Aduana
	Route::group(['middleware' => ['role:Admin|Aduana']], function () {
		Route::resource('aduana', AduanaController::class)
			->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
			->names([
				'index' => 'aduanas.index',
				'create' => 'aduanas.create',
				'store' => 'aduanas.store',
				'edit' => 'aduanas.edit',
				'update' => 'aduanas.update',
				'destroy' => 'aduanas.destroy',
		]);
		Route::get('aduana/transito/{id}', [AduanaController::class, 'transito'])->name('aduanas.transito');
		Route::get('aduana/selectivo/{id}', [AduanaController::class, 'selectivo'])->name('aduanas.selectivo');
	});

	// Rutas de Transrpote
	Route::group(['middleware' => ['role:Admin|Import']], function () {
		Route::resource('transport', TransportController::class)
			->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
			->names([
				'index' => 'transports.index',
				'create' => 'transports.create',
				'store' => 'transports.store',
				'edit' => 'transports.edit',
				'update' => 'transports.update',
				'destroy' => 'transports.destroy',
		]);
	});

	// Rutas de Origenes
	Route::group(['middleware' => ['role:Admin|Import']], function () {
		Route::resource('origin', OriginController::class)
			->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
			->names([
				'index' => 'origins.index',
				'create' => 'origins.create',
				'store' => 'origins.store',
				'edit' => 'origins.edit',
				'update' => 'origins.update',
				'destroy' => 'origins.destroy',
		]);
	});
});