<?php

namespace App\Http\Controllers;

use App\Models\Canvas;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CanvasController extends Controller
{
    public function index()
    {
        $canvas = Canvas::with('empresa')->get();
        return view('canvas.index', compact('canvas'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('canvas.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        Canvas::create($request->all());
        return redirect()->route('canvas.index')->with('success', 'Canvas criado com sucesso!');
    }

    public function show(Canvas $canvas)
    {
        return view('canvas.show', compact('canvas'));
    }

    public function edit(Canvas $canvas)
    {
        $empresas = Empresa::all();
        return view('canvas.edit', compact('canvas', 'empresas'));
    }

    public function update(Request $request, Canvas $canvas)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        $canvas->update($request->all());
        return redirect()->route('canvas.index')->with('success', 'Canvas atualizado com sucesso!');
    }

    public function destroy(Canvas $canvas)
    {
        $canvas->delete();
        return redirect()->route('canvas.index')->with('success', 'Canvas excluído com sucesso!');
    }
}
