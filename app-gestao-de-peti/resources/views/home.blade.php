@extends('layouts.inicial')
@section('title', 'Página Inicial')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<div class="container mt-5">

    <div class="text-center mb-4">
        <h1 class="fw-bold">Bem-vindo ao Sistema PETI</h1>
        <p class="text-muted fs-5">Gerencie sua organização, diagnósticos, canvas e projetos em um só lugar.</p>
    </div>

    <div class="row justify-content-center">

        {{-- Card Empresa --}}
        <div class="col-md-4 mb-3">
            <a href="{{ route('empresa.index') }}" class="card card-link shadow-sm home-card">
                <div class="card-body text-center">
                    <h4 class="card-title fw-bold">Minha Empresa</h4>
                    <p>Gerenciar dados da empresa</p>
                </div>
            </a>
        </div>

        {{-- Diagnóstico --}}
        <div class="col-md-4 mb-3">
            <a href="{{ route('diagnostico.index') }}" class="card card-link shadow-sm home-card">
                <div class="card-body text-center">
                    <h4 class="card-title fw-bold">Diagnóstico de TI</h4>
                    <p>Análises SWOT, recursos e riscos</p>
                </div>
            </a>
        </div>

        {{-- Canvas --}}
        <div class="col-md-4 mb-3">
            <a href="{{ route('canvas.index') }}" class="card card-link shadow-sm home-card">
                <div class="card-body text-center">
                    <h4 class="card-title fw-bold">Business Model Canvas</h4>
                    <p>Mapa estratégico do negócio</p>
                </div>
            </a>
        </div>

        {{-- Projetos (inacabado) --}}
        <div class="col-md-4 mb-3">
            <a href="/home" class="card card-link shadow-sm home-card">
                <div class="card-body text-center">
                    <h4 class="card-title fw-bold">Projetos do PETI</h4>
                    <p>Controle de ações e cronogramas</p>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection