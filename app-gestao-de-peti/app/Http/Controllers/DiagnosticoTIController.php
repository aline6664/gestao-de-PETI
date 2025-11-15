<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticoTI;
use App\Models\Empresa;
use Illuminate\Http\Request;

class DiagnosticoTIController extends Controller
{
    /**
     * Mostra o diagnóstico único.
     * Se não existir, cria automaticamente.
     */
    public function index()
    {
        $diagnostico = DiagnosticoTI::first();
        $empresa = Empresa::first();

        return view('diagnostico.index', compact('diagnostico', 'empresa'));
    }
    /**
     * Mostra o formulário de edição do diagnóstico único.
     */
    public function edit()
    {
        $diagnostico = DiagnosticoTI::first();

        if (!$diagnostico) {
            $diagnostico = DiagnosticoTI::create([]);
        }

        return view('diagnostico.edit', compact('diagnostico'));
    }

    /**
     * Atualiza o diagnóstico único.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nivel_maturidade' => 'nullable|string',
            'forcas'           => 'nullable|string',
            'fraquezas'        => 'nullable|string',
            'oportunidades'    => 'nullable|string',
            'ameacas'          => 'nullable|string',
            'recursos_ti'      => 'nullable|string',
            'riscos'           => 'nullable|string',
        ]);

        $diagnostico = DiagnosticoTI::first();

        if (!$diagnostico) {
            $diagnostico = DiagnosticoTI::create([]);
        }

        $diagnostico->update($request->all());

        return redirect()->route('diagnostico.index')
                         ->with('success', 'Diagnóstico atualizado com sucesso!');
    }
}