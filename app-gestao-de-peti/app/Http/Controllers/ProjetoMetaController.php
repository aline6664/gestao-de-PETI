<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\ProjetoMeta;
use Illuminate\Http\Request;

class ProjetoMetaController extends Controller
{
    public function store(Request $request, Projeto $projeto)
    {
        $request->validate([
            'descricao' => 'required|string',
            'criterio_sucesso' => 'nullable|string',
            'status' => 'required|in:planejada,andamento,concluida,cancelada',
        ]);

        $projeto->metas()->create($request->all());

        return back()->with('success', 'Meta adicionada!');
    }

    public function update(Request $request, Projeto $projeto, ProjetoMeta $meta)
    {
        $request->validate([
            'descricao' => 'required|string',
            'criterio_sucesso' => 'nullable|string',
            'status' => 'required|in:planejada,andamento,concluida,cancelada',
        ]);

        $meta->update($request->all());

        return back()->with('success', 'Meta atualizada!');
    }

    public function destroy(Projeto $projeto, ProjetoMeta $meta)
    {
        $meta->delete();

        return back()->with('success', 'Meta removida!');
    }
}