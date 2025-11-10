<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Exibe a página com os dados da organização.
     */
    public function index()
    {
        // Garante que sempre exista uma empresa (a primeira registrada)
        $empresa = Empresa::first();

        // Caso ainda não exista, cria uma empresa “vazia” na primeira execução
        if (!$empresa) {
            $empresa = Empresa::create([
                'nome_empresa' => 'Minha Empresa',
                'cnpj' => null,
                'email_contato' => null,
                'nome_empresa' => 'Minha Empresa',
                'cnpj' => null,
                'email_contato' => null,
                'endereco' => null,
                'cidade' => null,
                'estado' => null,
                'telefone' => null,
                'missao' => null,
                'visao' => null,
                'valores' => null,
            ]);
        }

        return view('empresa.index', compact('empresa'));
    }

    /**
     * Atualiza as informações da organização.
     */
    public function update(Request $request)
    {
        $empresa = Empresa::firstOrFail();

        $request->validate([
            'nome_empresa' => 'required|string|max:255',
            'cnpj' => 'nullable|string|max:20',
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
            ->with('success', 'Dados da organização atualizados com sucesso!');
    }
}
