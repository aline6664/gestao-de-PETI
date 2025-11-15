<?php

namespace App\Http\Controllers;

use App\Models\Canvas;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CanvasController extends Controller
{
    public function index()
    {
        // pega qualquer canvas existente (se houver)
        $canvas = Canvas::first();

        return view('canvas.index', compact('canvas'));
    }

    public function edit()
    {
        $canvas = Canvas::first();

        if (!$canvas) {
            // cria vazio automaticamente
            $canvas = Canvas::create(['empresa_id' => 1]);
        }

        return view('canvas.edit', compact('canvas'));
    }

    public function update(Request $request)
    {
        $canvas = Canvas::firstOrFail();

        $canvas->update($request->all());

        return redirect()->route('canvas.index')->with('success', 'Canvas atualizado com sucesso!');
    }
}