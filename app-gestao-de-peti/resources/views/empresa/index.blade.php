@extends('layouts.app')
@section('title', 'Minha Organização')

@section('content')
<div class="container">
    <h2 class="mb-4">Dados da Organização</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('empresa.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nome da Empresa</label>
                <input type="text" name="nome_empresa" class="form-control" value="{{ old('nome_empresa', $empresa->nome_empresa) }}" required>
                {{-- old() -> reter valores após erro de validação.--}}
            </div>
            <div class="col-md-6">
                <label>CNPJ</label>
                <input type="text" name="cnpj" class="form-control" value="{{ old('cnpj', $empresa->cnpj) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Email de Contato</label>
                <input type="email" name="email_contato" class="form-control" value="{{ old('email_contato', $empresa->email_contato) }}">
            </div>
            <div class="col-md-6">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $empresa->telefone) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-8">
                <label>Endereço</label>
                <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $empresa->endereco) }}">
            </div>
            <div class="col-md-2">
                <label>Cidade</label>
                <input type="text" name="cidade" class="form-control" value="{{ old('cidade', $empresa->cidade) }}">
            </div>
            <div class="col-md-2">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control" value="{{ old('estado', $empresa->estado) }}">
            </div>
        </div>

        <div class="mb-3">
            <label>Missão</label>
            <textarea name="missao" class="form-control" rows="2">{{ old('missao', $empresa->missao) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Visão</label>
            <textarea name="visao" class="form-control" rows="2">{{ old('visao', $empresa->visao) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Valores</label>
            <textarea name="valores" class="form-control" rows="2">{{ old('valores', $empresa->valores) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
</div>
@endsection
