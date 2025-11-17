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

// Página inicial (Home do Sistema)
Route::get('/', function () {
    return view('login');
})->name('login');

// Página de Login
Route::get('/home', function () {
    return view('home');
})->name('home');

// POST do login falso por enquanto
Route::post('/login', function() {
    return redirect()->route('home');
});

// ROTA DE DADOS DA EMPRESA
Route::get('/empresa', [EmpresaController::class, 'index'])->name('empresa.index');
Route::get('/empresa/editar', [EmpresaController::class, 'edit'])->name('empresa.edit');
Route::put('/empresa/atualizar', [EmpresaController::class, 'update'])->name('empresa.update');

// ROTAS DE DIAGNÓSTICO DE TI
Route::get('/diagnostico', [DiagnosticoTIController::class, 'index'])->name('diagnostico.index');
Route::get('/diagnostico/editar', [DiagnosticoTIController::class, 'edit'])->name('diagnostico.edit');
Route::put('/diagnostico', [DiagnosticoTIController::class, 'update'])->name('diagnostico.update');

// ROTAS DO BUSINESS MODEL CANVAS
Route::get('/canvas', [CanvasController::class, 'index'])->name('canvas.index');
Route::get('/canvas/edit', [CanvasController::class, 'edit'])->name('canvas.edit');
Route::put('/canvas/update', [CanvasController::class, 'update'])->name('canvas.update');


/*
    TEMPLATE PARA CADA ROTA, vale para 'diagnosticos' e 'canvas' também

    GET	        /empresas	            Lista todas as empresas
    GET	        /empresas/create	    Formulário de nova empresa
    POST	    /empresas	            Salva uma nova empresa
    GET	        /empresas/{id}/edit	    Editar uma empresa existente
    PUT/PATCH	/empresas/{id}	        Atualiza os dados
    DELETE	    /empresas/{id}	        Exclui
*/

