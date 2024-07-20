<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\MarcaVehiculoController;
use App\Http\Controllers\TarifaController;
// Ruta principal
Route::get('/', function () {
    return redirect()->route('login'); // Cambia 'login' por el nombre de tu ruta de login
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Rutas de registro
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::resource('usergroups', UserGroupController::class);
Route::get('usergroups/create', [UserGroupController::class, 'create'])->name('usergroups.create');
Route::resource('tipovehiculo', TipoVehiculoController::class);
Route::resource('marcavehiculo', MarcaVehiculoController::class);
Route::get('/marcavehiculo/{marcaVehiculo}/edit', [MarcaVehiculoController::class, 'edit'])->name('marcavehiculo.edit');
Route::put('marcavehiculo/{id}', 'MarcavehiculoController@update')->name('marcavehiculo.update');
Route::resource('tarifas', TarifaController::class);
