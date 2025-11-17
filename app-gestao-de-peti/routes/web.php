<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CanvasController;
use App\Http\Controllers\DiagnosticoTIController;
use App\Http\Controllers\EmpresaController;

use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\ProjetoAtividadeController;
use App\Http\Controllers\ProjetoMetaController;
use App\Http\Controllers\ProjetoIndicadorController;
use App\Http\Controllers\ProjetoCronogramaController;
use App\Http\Controllers\ProjetoResponsavelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rotas principais do sistema PETI.
| Cada módulo (Empresa, Diagnóstico, Canvas) tem suas rotas CRUD.
|
*/

// LOGIN (INICIAL)
Route::get('/', function () {
    return view('login');
})->name('login');

// HOME
Route::get('/home', function () {
    return view('home');
})->name('home');

// POST DE LOGIN FALSO (para teste)
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


// ROTAS DE EMPRESAS
Route::resource('projetos', ProjetoController::class);

// ATIVIDADES
Route::post('/projetos/{projeto}/atividades', 
    [ProjetoAtividadeController::class, 'store'])
    ->name('projetos.atividades.store');

Route::put('/projetos/{projeto}/atividades/{atividade}', 
    [ProjetoAtividadeController::class, 'update'])
    ->name('projetos.atividades.update');

Route::delete('/projetos/{projeto}/atividades/{atividade}', 
    [ProjetoAtividadeController::class, 'destroy'])
    ->name('projetos.atividades.destroy');

// METAS
Route::post('/projetos/{projeto}/metas', 
    [ProjetoMetaController::class, 'store'])
    ->name('projetos.metas.store');

Route::put('/projetos/{projeto}/metas/{meta}', 
    [ProjetoMetaController::class, 'update'])
    ->name('projetos.metas.update');

Route::delete('/projetos/{projeto}/metas/{meta}', 
    [ProjetoMetaController::class, 'destroy'])
    ->name('projetos.metas.destroy');

// INDICADORES
Route::post('/projetos/{projeto}/indicadores', 
    [ProjetoIndicadorController::class, 'store'])
    ->name('projetos.indicadores.store');

Route::put('/projetos/{projeto}/indicadores/{indicador}', 
    [ProjetoIndicadorController::class, 'update'])
    ->name('projetos.indicadores.update');

Route::delete('/projetos/{projeto}/indicadores/{indicador}', 
    [ProjetoIndicadorController::class, 'destroy'])
    ->name('projetos.indicadores.destroy');

// CRONOGRAMA
Route::post('/projetos/{projeto}/cronograma', 
    [ProjetoCronogramaController::class, 'store'])
    ->name('projetos.cronograma.store');

Route::put('/projetos/{projeto}/cronograma/{etapa}', 
    [ProjetoCronogramaController::class, 'update'])
    ->name('projetos.cronograma.update');

Route::delete('/projetos/{projeto}/cronograma/{etapa}', 
    [ProjetoCronogramaController::class, 'destroy'])
    ->name('projetos.cronograma.destroy');

/*
    TEMPLATE PARA CADA ROTA, vale para 'diagnosticos' e 'canvas' também

    GET	        /empresas	            Lista todas as empresas
    GET	        /empresas/create	    Formulário de nova empresa
    POST	    /empresas	            Salva uma nova empresa
    GET	        /empresas/{id}/edit	    Editar uma empresa existente
    PUT/PATCH	/empresas/{id}	        Atualiza os dados
    DELETE	    /empresas/{id}	        Exclui
*/

