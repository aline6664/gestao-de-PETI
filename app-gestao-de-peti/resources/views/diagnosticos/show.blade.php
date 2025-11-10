@extends('layouts.app')
@section('title', 'Detalhes do Diagnóstico')

@section('content')
<div class="container">
    <h2 class="mb-4">
        Diagnóstico de TI — {{ $diagnostico->empresa->nome_empresa ?? 'Sem empresa vinculada' }}
    </h2>

    <div class="mb-3">
        <strong>Nível de Maturidade:</strong> {{ $diagnostico->nivel_maturidade ?? '—' }}
        <br>
        <small class="text-muted">Criado em: {{ $diagnostico->created_at->format('d/m/Y H:i') }}</small>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Análise SWOT</h5>
        </div>
        <div class="card-body">
            <p><strong>Forças:</strong> {{ $diagnostico->forcas ?? '—' }}</p>
            <p><strong>Fraquezas:</strong> {{ $diagnostico->fraquezas ?? '—' }}</p>
            <p><strong>Oportunidades:</strong> {{ $diagnostico->oportunidades ?? '—' }}</p>
            <p><strong>Ameaças:</strong> {{ $diagnostico->ameacas ?? '—' }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Recursos de TI</h5>
        </div>
        <div class="card-body">
            <p>{{ $diagnostico->recursos_ti ?? '—' }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Riscos Identificados</h5>
        </div>
        <div class="card-body">
            <p>{{ $diagnostico->riscos ?? '—' }}</p>
        </div>
    </div>

    <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
