<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\ProjetoIndicador;
use Illuminate\Http\Request;

class ProjetoIndicadorController extends Controller
{
    public function store(Request $request, Projeto $projeto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor_atual' => 'nullable|numeric',
            'valor_meta' => 'nullable|numeric',
            'unidade' => 'nullable|string|max:50',
        ]);

        $projeto->indicadores()->create($request->all());

        return back()->with('success', 'Indicador adicionado!');
    }

    public function update(Request $request, Projeto $projeto, ProjetoIndicador $indicador)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'valor_atual' => 'nullable|numeric',
            'valor_meta' => 'nullable|numeric',
            'unidade' => 'nullable|string|max:50',
        ]);

        $indicador->update($request->all());

        return back()->with('success', 'Indicador atualizado!');
    }

    public function destroy(Projeto $projeto, ProjetoIndicador $indicador)
    {
        $indicador->delete();

        return back()->with('success', 'Indicador removido!');
    }
}