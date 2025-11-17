<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\ProjetoAtividade;
use Illuminate\Http\Request;

class ProjetoAtividadeController extends Controller
{
    public function store(Request $request, Projeto $projeto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:planejada,andamento,concluida,cancelada',
            'responsavel' => 'nullable|string|max:255',
            'data_inicio' => 'nullable|date',
            'data_fim_prevista' => 'nullable|date|after_or_equal:data_inicio',
        ]);

        $projeto->atividades()->create($request->all());

        return back()->with('success', 'Atividade adicionada!');
    }

    public function update(Request $request, Projeto $projeto, ProjetoAtividade $atividade)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:planejada,andamento,concluida,cancelada',
        ]);

        $atividade->update($request->all());

        return back()->with('success', 'Atividade atualizada!');
    }

    public function destroy(Projeto $projeto, ProjetoAtividade $atividade)
    {
        $atividade->delete();

        return back()->with('success', 'Atividade removida!');
    }
}