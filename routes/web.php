<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\CocheBackendController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeBackendController;
use App\Http\Controllers\Auth\LoginController;

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

/* Página principal */
Route::get('/', [CocheController::class, 'index'])->name('main');
Route::get('coche/index', [CocheController::class, 'myCars'])->name('user.coches');
Route::get('coches', [CocheController::class, 'all'])->name('coches');
Route::get('show/vehiculo/{coche}', [CocheController::class, 'show'])->name('show.coche');

/* Backend */
Route::get('/backend', [CocheBackendController::class, 'index'])->name('backend');
Route::get('/backend/users', [CocheBackendController::class, 'users'])->name('backend.users');
Route::get('/backend/coches/{user}', [CocheBackendController::class, 'userCoches'])->name('backend.coches.user');
Route::get('/backend/profile/{user}', [HomeBackendController::class, 'index'])->name('backend.profile.user');
//Route::get('/backend/show/vehiculo/{coche}', [CocheBackendController::class, 'show'])->name('backend.show.coche');

Route::get('/backend/user/{user}/edit/', [HomeBackendController::class, 'edit'])->name('backend.user.edit');
Route::put('/backend/user/{user}', [HomeBackendController::class, 'update'])->name('backend.user.update');

Route::resource('backend/coche', CocheBackendController::class, ['names' => 'coche.backend']);

/* Rutas que se generan por usar el sistema de gestion de usuarios */
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('user/edit', [HomeController::class, 'edit'])->name('user.edit');
Route::put('user/update', [HomeController::class, 'update'])->name('user.update');
Route::delete('user/destroy', [HomeController::class, 'destroy'])->name('user.destroy');

Route::post('api/fetch-states', [HomeController::class, 'fetchState']);
Route::post('api/fetch-cities', [HomeController::class, 'fetchCity']);

//Route::resource('user', HomeController::class, ['names' => 'user']);

/* Ruta para enviar un email de contacto en el show de coche */
Route::put('/home', [CocheController::class, 'sendEmail'])->name('coche.sendEmail');

/* Rutas de los recursos */
Route::resource('coche', CocheController::class, ['names' => 'coche']);

Route::post('api/fetch-makes', [CocheController::class, 'fetchMake']);
Route::post('api/fetch-makeyears', [CocheController::class, 'fetchMakeYear']);
Route::post('api/fetch-modelscar', [CocheController::class, 'fetchModelCar']);