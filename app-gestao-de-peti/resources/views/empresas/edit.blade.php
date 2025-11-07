@extends('layouts.app')
@section('title', 'Editar Empresa')

@section('content')
<h2>Editar Empresa</h2>
<form action="{{ route('empresas.update', $empresa->id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col">
            <label>Nome da Empresa</label>
            <input type="text" name="nome_empresa" class="form-control" value="{{ $empresa->nome_empresa }}" required>
        </div>
        <div class="col">
            <label>CNPJ</label>
            <input type="text" name="cnpj" class="form-control" value="{{ $empresa->cnpj }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Email</label>
            <input type="email" name="email_contato" class="form-control" value="{{ $empresa->email_contato }}">
        </div>
        <div class="col">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ $empresa->telefone }}">
        </div>
    </div>

    <div class="mb-3">
        <label>Missão</label>
        <textarea name="missao" class="form-control">{{ $empresa->missao }}</textarea>
    </div>
    <div class="mb-3">
        <label>Visão</label>
        <textarea name="visao" class="form-control">{{ $empresa->visao }}</textarea>
    </div>
    <div class="mb-3">
        <label>Valores</label>
        <textarea name="valores" class="form-control">{{ $empresa->valores }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection