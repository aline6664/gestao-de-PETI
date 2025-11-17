@extends('layouts.app')
@section('title', 'Editar Organização')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/empresa.css') }}">
@endsection

@section('content')

<div class="container mt-4">

    <h2 class="page-title mb-4">Editar Dados da Organização</h2>

    <form action="{{ route('empresa.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            {{-- Dados Básicos --}}
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm empresa-card">
                    <div class="card-header-color card-header">Informações Básicas</div>
                    <div class="card-body">
                        
                        <label class="fw-bold">Nome da Empresa</label>
                        <input type="text" name="nome_empresa" class="form-control mb-2" required
                               value="{{ old('nome_empresa', $empresa->nome_empresa) }}">

                        <label class="fw-bold">CNPJ</label>
                        <input type="text" name="cnpj" class="form-control mb-2"
                               value="{{ old('cnpj', $empresa->cnpj) }}">

                        <label class="fw-bold">Email</label>
                        <input type="email" name="email_contato" class="form-control mb-2"
                               value="{{ old('email_contato', $empresa->email_contato) }}">

                        <label class="fw-bold">Telefone</label>
                        <input type="text" name="telefone" class="form-control mb-2"
                               value="{{ old('telefone', $empresa->telefone) }}">
                    </div>
                </div>
            </div>

            {{-- Endereço --}}
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm empresa-card">
                    <div class="card-header-color card-header">Endereço</div>
                    <div class="card-body">
                        
                        <label class="fw-bold">Endereço</label>
                        <input type="text" name="endereco" class="form-control mb-2"
                               value="{{ old('endereco', $empresa->endereco) }}">

                        <label class="fw-bold">Cidade</label>
                        <input type="text" name="cidade" class="form-control mb-2"
                               value="{{ old('cidade', $empresa->cidade) }}">

                        <label class="fw-bold">Estado</label>
                        <input type="text" name="estado" class="form-control mb-2"
                               value="{{ old('estado', $empresa->estado) }}">
                    </div>
                </div>
            </div>

            {{-- Missão --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm empresa-card">
                    <div class="card-header-color card-header">Missão</div>
                    <div class="card-body">
                        <textarea name="missao" rows="3" class="form-control">{{ old('missao', $empresa->missao) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Visão --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm empresa-card">
                    <div class="card-header-color card-header">Visão</div>
                    <div class="card-body">
                        <textarea name="visao" rows="3" class="form-control">{{ old('visao', $empresa->visao) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Valores --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm empresa-card">
                    <div class="card-header-color card-header">Valores</div>
                    <div class="card-body">
                        <textarea name="valores" rows="3" class="form-control">{{ old('valores', $empresa->valores) }}</textarea>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-3 d-flex gap-2">
            <button class="btn btn-success">Salvar Alterações</button>
            <a href="{{ route('empresa.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</div>

@endsection