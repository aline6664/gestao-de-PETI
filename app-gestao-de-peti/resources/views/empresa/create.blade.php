@extends('layouts.app')
@section('title', 'Cadastrar Empresa')

@section('content')
<h2>Cadastrar Nova Empresa</h2>
<form action="{{ route('empresas.store') }}" method="POST" class="mt-3">
    @csrf {{-- Proteção contra Cross-Site Request Forgery, gerando um token CSRF único para cada sessão ativa do usuário --}}
    <div class="row mb-3">
        <div class="col">
            <label>Nome da Empresa</label>
            <input type="text" name="nome_empresa" class="form-control" required>
        </div>
        <div class="col">
            <label>CNPJ</label>
            <input type="text" name="cnpj" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control">
        </div>
        <div class="col">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control">
        </div>
        <div class="col">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>
        <div class="col">
            <label>Email</label>
            <input type="email" name="email_contato" class="form-control">
        </div>
    </div>
    <div class="mb-3">
        <label>Missão</label>
        <textarea name="missao" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Visão</label>
        <textarea name="visao" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Valores</label>
        <textarea name="valores" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection