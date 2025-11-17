<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\ProjetoCronograma;
use Illuminate\Http\Request;

class ProjetoCronogramaController extends Controller
{
    public function store(Request $request, Projeto $projeto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'status' => 'required|in:planejado,andamento,concluido,cancelado',
        ]);

        $projeto->cronograma()->create($request->all());

        return back()->with('success', 'Etapa do cronograma adicionada!');
    }

    public function update(Request $request, Projeto $projeto, ProjetoCronograma $etapa)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'status' => 'required|in:planejado,andamento,concluido,cancelado',
        ]);

        $etapa->update($request->all());

        return back()->with('success', 'Cronograma atualizado!');
    }

    public function destroy(Projeto $projeto, ProjetoCronograma $etapa)
    {
        $etapa->delete();

        return back()->with('success', 'Etapa removida!');
    }
}