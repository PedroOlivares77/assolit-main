<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\NavegacionController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'inicio'])->name('index');

Route::post('/login', [SesionController::class, 'iniciarSesion']);
Route::get('/login', [SesionController::class, 'mostrar'])->name('login');
Route::post('/registro', [SesionController::class, 'registro'])->name('registro');
Route::get('/registro', [SesionController::class, 'mostrarRegistro'])->name('formularioRegistro');

Route::get('/viviendas', [NavegacionController::class, 'viviendas'])->name("viviendasTuteladas");
Route::get('/como-trabajamos', [NavegacionController::class, 'comoTrabajamos'])->name("comoTrabajamos");
Route::get('/empleo', [NavegacionController::class, 'empleoVoluntariado'])->name("empleoVoluntariado");
Route::get('/conocenos', [NavegacionController::class, 'conocenos'])->name("conocenos");


Route::middleware('auth')->group(function() {
    Route::get('/logout', [SesionController::class, 'cerrarSesion'])->name('logout');
    Route::get('/area-cliente', [UsuariosController::class, 'mostrarMiAreaCliente'])->name("miAreaCliente");
});

Route::middleware(['auth', 'rol:admin'])->group(function() {
    Route::get('/admin', [UsuariosController::class, 'mostrarAdmin'])->name("indexAdmin");
});

Route::middleware(['auth', 'rol:psiquiatra'])->group(function() {
    Route::get('/trabajador-psiquiatra', [UsuariosController::class, 'mostrarPsiquiatra'])->name("miAreaPsiquiatra");
});

Route::middleware(['auth', 'rol:trabajador_social'])->group(function() {
    Route::get('/trabajador-social', [UsuariosController::class, 'mostrarSocial'])->name("miAreaTrabajadorSocial");
});

