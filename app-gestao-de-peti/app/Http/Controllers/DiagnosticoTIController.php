<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticoTI;
use App\Models\Empresa;
use Illuminate\Http\Request;

class DiagnosticoTIController extends Controller
{
    public function index()
    {
        $diagnosticos = DiagnosticoTI::with('empresa')->get();
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('diagnosticos.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        DiagnosticoTI::create($request->all());
        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico criado com sucesso!');
    }

    public function show(DiagnosticoTI $diagnostico)
    {
        return view('diagnosticos.show', compact('diagnostico'));
    }

    public function edit(DiagnosticoTI $diagnostico)
    {
        $empresas = Empresa::all();
        return view('diagnosticos.edit', compact('diagnostico', 'empresas'));
    }

    public function update(Request $request, DiagnosticoTI $diagnostico)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $diagnostico->update($request->all());
        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico atualizado com sucesso!');
    }

    public function destroy(DiagnosticoTI $diagnostico)
    {
        $diagnostico->delete();
        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico excluído com sucesso!');
    }
}
