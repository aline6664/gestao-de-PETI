<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Exibe os dados da organização (somente leitura).
     */
    public function index()
    {
        // Busca a primeira empresa
        $empresa = Empresa::first();

        // Caso não exista nenhuma, cria uma vazia, mas sem sobrescrever valores do seeder
        if (!$empresa) {
            $empresa = Empresa::create([
                'nome_empresa' => 'Minha Empresa',
            ]);
        }

        return view('empresa.index', compact('empresa'));
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit()
    {
        $empresa = Empresa::firstOrFail();

        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Atualiza as informações da organização.
     */
    public function update(Request $request)
    {
        $empresa = Empresa::firstOrFail();

        $request->validate([
            'nome_empresa' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20',
            'email_contato' => 'nullable|email',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:100',
            'telefone' => 'nullable|string|max:30',
            'missao' => 'nullable|string',
            'visao' => 'nullable|string',
            'valores' => 'nullable|string',
        ]);

        $empresa->update($request->all());

        return redirect()
            ->route('empresa.index')
            ->with('success', 'Dados atualizados com sucesso!');
    }
}
