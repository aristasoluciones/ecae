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

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/', function () {
    return redirect('aspirante');
});

Route::get('/aspirantes', [\App\Http\Controllers\AspiranteController::class, 'index'])->name('aspirantes')->middleware('auth');
Route::get('/aspirante/{aspirante?}', \App\Http\Livewire\Aspirantes\Formulario::class)->name('aspirante');
Route::get('/usuarios', \App\Http\Controllers\UsuarioController::class)->name('usuarios')->middleware('auth');
Route::get('/solicitud/{aspirante}', \App\Http\Controllers\SolicitudController::class)->name('solicitud')->middleware('auth');
Route::get('/roles', \App\Http\Controllers\RoleController::class)->name('roles')->middleware('auth');
