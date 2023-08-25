<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarioController;

//rota POST para os GRAVAR USUARIOS
Route::post('/usuarios/gravarusuario', [usuarioController::class, 'gravarUsuario']);

//rota DELET para EXCLUIR USUARIOS
Route::delete('/usuarios/excluirusuario/{id}', [usuarioController::class, 'deleteUsuario']);

//rota GET criada para os LISTAR USUARIOS 
Route::get('/usuarios', [usuarioController::class, 'indexUsuario']);

//rota GET para LISTAR USUARIO ESPECIFICO 
Route::get('/usuario/{id}', [usuarioController::class, 'showUsuario']);

//rota POST para AUTENTICAR O USUARIO
Route::post('/usuario/auth', [loginController::class, 'autenticarUsuario']);
