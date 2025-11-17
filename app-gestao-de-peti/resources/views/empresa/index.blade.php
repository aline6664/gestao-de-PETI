@extends('layouts.app')
@section('title', 'Minha Organização')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/empresa.css') }}">
@endsection

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title">Dados da Organização</h2>
        <a href="{{ route('empresa.edit') }}" class="btn btn-blue">
            Editar Informações
        </a>
    </div>

    <div class="row">

        {{-- Dados Básicos --}}
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm empresa-card">
                <div class="card-header-color card-header">Informações Básicas</div>
                <div class="card-body">
                    <p><strong>Nome da Empresa:</strong> {{ $empresa->nome_empresa }}</p>
                    <p><strong>CNPJ:</strong> {{ $empresa->cnpj ?? '—' }}</p>
                    <p><strong>Email:</strong> {{ $empresa->email_contato ?? '—' }}</p>
                    <p><strong>Telefone:</strong> {{ $empresa->telefone ?? '—' }}</p>
                </div>
            </div>
        </div>

        {{-- Endereço --}}
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm empresa-card">
                <div class="card-header-color card-header">Endereço</div>
                <div class="card-body">
                    <p><strong>Endereço:</strong> {{ $empresa->endereco ?? '—' }}</p>
                    <p><strong>Cidade:</strong> {{ $empresa->cidade ?? '—' }}</p>
                    <p><strong>Estado:</strong> {{ $empresa->estado ?? '—' }}</p>
                </div>
            </div>
        </div>

        {{-- Missão --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm empresa-card">
                <div class="card-header-color card-header">Missão</div>
                <div class="card-body">
                    <p>{{ $empresa->missao ?? '—' }}</p>
                </div>
            </div>
        </div>

        {{-- Visão --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm empresa-card">
                <div class="card-header-color card-header">Visão</div>
                <div class="card-body">
                    <p>{{ $empresa->visao ?? '—' }}</p>
                </div>
            </div>
        </div>

        {{-- Valores --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm empresa-card">
                <div class="card-header-color card-header">Valores</div>
                <div class="card-body">
                    <p>{{ $empresa->valores ?? '—' }}</p>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection