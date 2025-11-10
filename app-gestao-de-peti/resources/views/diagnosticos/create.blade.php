@extends('layouts.app')
@section('title', 'Novo Diagnóstico de TI')

@section('content')
<div class="container">
    <h2 class="mb-4">Novo Diagnóstico de TI</h2>
    <p class="text-muted">Objetivo: levantar a situação atual da empresa e da área de TI.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('diagnosticos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Empresa</label>
            <select name="empresa_id" class="form-control" required>
                <option value="">Selecione uma empresa...</option>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ old('empresa_id') == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->nome_empresa }}
                    </option>
                @endforeach
            </select>
        </div>

        <h4 class="mt-4">Análise SWOT</h4>
        <div class="mb-3">
            <label>Forças</label>
            <textarea name="forcas" class="form-control">{{ old('forcas') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Fraquezas</label>
            <textarea name="fraquezas" class="form-control">{{ old('fraquezas') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Oportunidades</label>
            <textarea name="oportunidades" class="form-control">{{ old('oportunidades') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Ameaças</label>
            <textarea name="ameacas" class="form-control">{{ old('ameacas') }}</textarea>
        </div>

        <h4 class="mt-4">Maturidade e Recursos</h4>
        <div class="mb-3">
            <label>Nível de Maturidade</label>
            <select name="nivel_maturidade" class="form-control">
                <option value="">Selecione...</option>
                @foreach(['Inicial', 'Repetível', 'Definido', 'Gerenciado', 'Otimizado'] as $nivel)
                    <option value="{{ $nivel }}" {{ old('nivel_maturidade') == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Recursos de TI</label>
            <textarea name="recursos_ti" class="form-control">{{ old('recursos_ti') }}</textarea>
        </div>

        <h4 class="mt-4">Riscos</h4>
        <div class="mb-3">
            <label>Riscos Identificados</label>
            <textarea name="riscos" class="form-control">{{ old('riscos') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
