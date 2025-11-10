@extends('layouts.app')
@section('title', 'Editar Diagnóstico de TI')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Diagnóstico de TI</h2>
    <p class="text-muted">Atualize as informações do diagnóstico da empresa selecionada.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('diagnosticos.update', $diagnostico->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Empresa</label>
            <select name="empresa_id" class="form-control" required>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ $diagnostico->empresa_id == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->nome_empresa }}
                    </option>
                @endforeach
            </select>
        </div>

        <h4 class="mt-4">Análise SWOT</h4>
        <div class="mb-3">
            <label>Forças</label>
            <textarea name="forcas" class="form-control">{{ $diagnostico->forcas }}</textarea>
        </div>
        <div class="mb-3">
            <label>Fraquezas</label>
            <textarea name="fraquezas" class="form-control">{{ $diagnostico->fraquezas }}</textarea>
        </div>
        <div class="mb-3">
            <label>Oportunidades</label>
            <textarea name="oportunidades" class="form-control">{{ $diagnostico->oportunidades }}</textarea>
        </div>
        <div class="mb-3">
            <label>Ameaças</label>
            <textarea name="ameacas" class="form-control">{{ $diagnostico->ameacas }}</textarea>
        </div>

        <h4 class="mt-4">Maturidade e Recursos</h4>
        <div class="mb-3">
            <label>Nível de Maturidade</label>
            <select name="nivel_maturidade" class="form-control">
                @foreach(['Inicial','Repetível','Definido','Gerenciado','Otimizado'] as $nivel)
                    <option value="{{ $nivel }}" {{ $diagnostico->nivel_maturidade == $nivel ? 'selected' : '' }}>
                        {{ $nivel }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Recursos de TI</label>
            <textarea name="recursos_ti" class="form-control">{{ $diagnostico->recursos_ti }}</textarea>
        </div>

        <h4 class="mt-4">Riscos</h4>
        <div class="mb-3">
            <label>Riscos Identificados</label>
            <textarea name="riscos" class="form-control">{{ $diagnostico->riscos }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
