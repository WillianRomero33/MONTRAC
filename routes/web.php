<?php

use App\Http\Controllers\BodegaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VigilanciaController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\AduanaController;

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
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

// Nuevas rutas para Vigilancia
Route::get('vigilancia', [VigilanciaController::class, 'index'])->name('vigilancia.index');
Route::post('vigilancia/confirmar/{id}', [VigilanciaController::class, 'confirmarIngreso'])->name('vigilancia.confirmarIngreso');

Route::get('bodega',[BodegaController::class, 'index'])->name('bodega.bodega');
Route::get('/bodega/{id}/edit', [BodegaController::class, 'edit'])->name('bodega.edit');
Route::get('/bodega/{id}/submit', [BodegaController::class, 'submit'])->name('bodega.submit');

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

Route::resource('aduana', AduanaController::class)
	->only(['index', 'create', 'store', 'report', 'edit', 'update', 'destroy', 'submit'])
	->names([
		'index' => 'aduanas.index',
		'create' => 'aduanas.create',
		'store' => 'aduanas.store',
		'report' => 'aduanas.report',
		'edit' => 'aduanas.edit',
		'update' => 'aduanas.update',
		'destroy' => 'aduanas.destroy',
		'transito' => 'aduanas.transito',
]);
Route::get('aduana/transito/{id}', [AduanaController::class, 'transito'])->name('aduanas.transito');
Route::get('aduana/selectivo/{id}', [AduanaController::class, 'selectivo'])->name('aduanas.selectivo');
