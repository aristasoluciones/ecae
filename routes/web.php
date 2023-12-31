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
/*Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');*/



Route::get('/home', function() {
    return view('home');
})->name('home')->middleware(['auth']);

Route::get('/', function () {
    return redirect('aspirante');
});

Route::get('/aspirantes', [\App\Http\Controllers\AspiranteController::class, 'index'])->name('aspirantes')->middleware('auth');
Route::get('/aspirante/{aspirante?}', \App\Http\Livewire\Aspirantes\Formulario::class)->name('aspirante');
Route::get('/usuarios', \App\Http\Controllers\UsuarioController::class)->name('usuarios')->middleware('auth','permission:configuraciones.usuarios');
Route::get('/solicitud/{aspirante}', \App\Http\Controllers\SolicitudController::class)->name('solicitud')->middleware('auth');
Route::get('/estadistica', \App\Http\Controllers\EstadisticaController::class)->name('estadistica')->middleware('auth');
Route::get('/roles', \App\Http\Controllers\RoleController::class)->name('roles')->middleware('auth');
