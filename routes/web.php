<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Middleware\LoadUserPermissions;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\MarcaVehiculoController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ValidatorClienteController;
// Ruta principal
Route::get('/', function () {
    return redirect()->route('login'); // Cambia 'login' por el nombre de tu ruta de login
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    LoadUserPermissions::class,
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
Route::get('forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
Route::get('/send-test-email', [TestController::class, 'sendTestEmail']);
Route::resource('users', UserController::class);
Route::get('/users/data/{id}', [UserController::class, 'getUserData']);
Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('clientes/validados', [ValidatorClienteController::class, 'index'])->name('clientes2.validados');
