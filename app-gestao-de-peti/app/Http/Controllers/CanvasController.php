<?php

namespace App\Http\Controllers;

use App\Models\Canvas;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CanvasController extends Controller
{
    public function index()
    {
        $canvas = Canvas::first(); // único canva
        return view('canvas.index', compact('canvas'));
    }

    public function edit()
    {
        $canvas = Canvas::first();

        $jsonFields = [
            'proposta_valor',
            'segmentos_clientes',
            'canais_distribuicao',
            'relacionamento_clientes',
            'fontes_receita',
            'recursos_chave',
            'atividades_chave',
            'parcerias_chave',
            'estrutura_custos',
        ];

        $data = $request->all();

        foreach ($jsonFields as $field) {
            $data[$field] = array_values(array_filter($request->$field ?? []));
        }

        $canvas->update($data);

        return redirect()->route('canvas.index')->with('success', 'Canvas atualizado!');
    }
}