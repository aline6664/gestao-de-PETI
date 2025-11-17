<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Dashboard + lista de projetos.
     */
    public function index()
    {
        $projetos = Projeto::with(['atividades', 'metas'])->get();

        return view('projetos.index', compact('projetos'));
    }

    /**
     * Formulário de criação.
     */
    public function create()
    {
        return view('projetos.create');
    }

    /**
     * Salvar novo projeto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|string|in:planejado,andamento,concluido,cancelado',
            'data_inicio' => 'nullable|date',
            'data_fim_prevista' => 'nullable|date|after_or_equal:data_inicio',
        ]);

        $projeto = Projeto::create($request->all());

        return redirect()
            ->route('projetos.show', $projeto->id)
            ->with('success', 'Projeto criado com sucesso!');
    }

    /**
     * Exibir um único projeto.
     */
    public function show(Projeto $projeto)
    {
        $projeto->load([
            'atividades',
            'metas',
            'cronograma',
            'indicadores',
            'responsaveis'
        ]);

        return view('projetos.show', compact('projeto'));
    }

    /**
     * Formulário de edição.
     */
    public function edit(Projeto $projeto)
    {
        return view('projetos.edit', compact('projeto'));
    }

    /**
     * Atualizar projeto.
     */
    public function update(Request $request, Projeto $projeto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|string|in:planejado,andamento,concluido,cancelado',
            'data_inicio' => 'nullable|date',
            'data_fim_prevista' => 'nullable|date|after_or_equal:data_inicio',
        ]);

        $projeto->update($request->all());

        return redirect()
            ->route('projetos.show', $projeto->id)
            ->with('success', 'Projeto atualizado com sucesso!');
    }

    /**
     * Excluir projeto.
     */
    public function destroy(Projeto $projeto)
    {
        $projeto->delete();

        return redirect()
            ->route('projetos.index')
            ->with('success', 'Projeto excluído com sucesso!');
    }
}