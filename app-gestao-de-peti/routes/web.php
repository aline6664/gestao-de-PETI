<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CanvasController;
use App\Http\Controllers\DiagnosticoTIController;
use App\Http\Controllers\EmpresaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rotas principais do sistema PETI.
| Cada módulo (Empresa, Diagnóstico, Canvas) tem suas rotas CRUD.
|
*/

// Página inicial
Route::get('/', function () {
    return view('layouts/app');
});

// ROTAS DE EMPRESAS
Route::resource('empresas', EmpresaController::class);

// ROTAS DE DIAGNÓSTICO DE TI
Route::resource('diagnosticos', DiagnosticoTIController::class);

// ROTAS DO BUSINESS MODEL CANVAS
Route::resource('canvas', CanvasController::class);

/*
    TEMPLATE PARA CADA ROTA, vale para 'diagnosticos' e 'canvas' também

    GET	        /empresas	            Lista todas as empresas
    GET	        /empresas/create	    Formulário de nova empresa
    POST	    /empresas	            Salva uma nova empresa
    GET	        /empresas/{id}/edit	    Editar uma empresa existente
    PUT/PATCH	/empresas/{id}	        Atualiza os dados
    DELETE	    /empresas/{id}	        Exclui
*/

