<?php

use App\Http\Controllers\IndexAdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\NavegacionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ViviendasController;
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
    Route::get('/area-cliente', [UsersController::class, 'mostrarMiAreaCliente'])->name("miAreaCliente");
    Route::get('/noPermitido', [NavegacionController::class, 'noPermitido'])->name("noPermitido");
});

Route::middleware(['auth', 'rol:psiquiatra'])->group(function() {
    Route::get('/trabajador-psiquiatra', [UsersController::class, 'mostrarPsiquiatra'])->name("miAreaPsiquiatra");
});

Route::middleware(['auth', 'rol:trabajador_social'])->group(function() {
    Route::get('/trabajador-social', [UsersController::class, 'mostrarSocial'])->name("miAreaTrabajadorSocial");
});

Route::middleware(['auth', 'rol:admin'])->group(function() {
    Route::get('/admin', [IndexAdminController::class, 'mostrarAdmin'])->name("indexAdmin");

    Route::get('/admin/users', [UsersController::class, 'mostrar'])->name("users");
    Route::get('/admin/users/insertar', [UsersController::class, 'mostrarFormIns'])->name("formularioUserIns");
    Route::post('/admin/users/insertar', [UsersController::class, 'insertar'])->name("crearUser");
    Route::get('/admin/users/formulario/{id}', [UsersController::class, 'mostrarFormEd'])->name("formularioUsersEd");
    Route::post('/admin/users/formulario/{id}', [UsersController::class, 'editar'])->name("editarUser");
    Route::delete('/admin/users/eliminar/{id}', [UsersController::class, 'eliminar'])->where(array('id' => '[0-9]*'))->name("eliminarUser");

    Route::get('/admin/roles', [RolesController::class, 'mostrar'])->name("roles");
    Route::get('/admin/roles/api/listar', [RolesController::class, 'listar'])->name("rolesListar");
    Route::get('/admin/roles/{id}', [RolesController::class, 'buscar'])->where(array('id' => '[0-9]*'))->name("buscarRol");
    Route::post('/admin/roles/insertar', [RolesController::class, 'insertar'])->name("crearRoles");
    Route::get('/roles/editar/{id}', [RolesController::class, 'mostrarEditar'])->where(array('id' => '[0-9]*'))->name("mostrarEditarRoles");
    Route::post('/roles/editar/{id}', [RolesController::class, 'editar'])->where(array('id' => '[0-9]*'));
    Route::delete('/admin/roles/eliminar/{id}', [RolesController::class, 'eliminar'])->where(array('id' => '[0-9]*'))->name("eliminarRoles");

    Route::get('/admin/usuarios', [UsuariosController::class, 'mostrar'])->name("usuarios");
    Route::get('/admin/usuarios/insertar', [UsuariosController::class, 'mostrarFormIns'])->name("formularioUsuariosIns");
    Route::post('/admin/usuarios/insertar', [UsuariosController::class, 'insertar'])->name("crearUsuario");
    Route::get('/admin/usuarios/formulario/{id}', [UsuariosController::class, 'mostrarFormEd'])->name("formularioUsuarioEd");
    Route::post('/admin/usuarios/formulario/{id}', [UsuariosController::class, 'editar'])->name("editarUsuario");
    Route::delete('/admin/usuarios/eliminar/{id}', [UsuariosController::class, 'eliminar'])->where(array('id' => '[0-9]*'))->name("eliminarUsuario");

    Route::get('/admin/medicamentos', [MedicamentosController::class, 'mostrar'])->name("medicamentos");
    Route::get('/admin/medicamentos/insertar', [MedicamentosController::class, 'mostrarFormIns'])->name("formularioMedicamentosIns");
    Route::post('/admin/medicamentos/insertar', [MedicamentosController::class, 'insertar'])->name("crearMedicamento");
    Route::get('/admin/medicamentos/formulario/{id}', [MedicamentosController::class, 'mostrarFormEd'])->name("formularioMedicamentoEd");
    Route::post('/admin/medicamentos/formulario/{id}', [MedicamentosController::class, 'editar'])->name("editarMedicamento");
    Route::delete('/admin/medicamentos/eliminar/{id}', [MedicamentosController::class, 'eliminar'])->where(array('id' => '[0-9]*'))->name("eliminarMedicamento");
    
    Route::get('/admin/viviendas', [ViviendasController::class, 'mostrar'])->name("viviendas");
    Route::get('/admin/viviendas/insertar', [ViviendasController::class, 'mostrarFormIns'])->name("formularioViviendasIns");
    Route::post('/admin/viviendas/insertar', [ViviendasController::class, 'insertar'])->name("crearVivienda");
    Route::get('/admin/viviendas/formulario/{id}', [ViviendasController::class, 'mostrarFormEd'])->name("formularioViviendaEd");
    Route::post('/admin/viviendas/formulario/{id}', [ViviendasController::class, 'editar'])->name("editarVivienda");
    Route::delete('/admin/viviendas/eliminar/{id}', [ViviendasController::class, 'eliminar'])->where(array('id' => '[0-9]*'))->name("eliminarVivienda");
});



