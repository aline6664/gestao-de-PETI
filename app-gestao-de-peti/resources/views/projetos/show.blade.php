@extends('layouts.app')
@section('title', 'Projeto: ' . $projeto->nome)

@section('styles')
<link rel="stylesheet" href="{{ asset('css/projetos.css') }}">
@endsection

@section('content')
<div class="container mt-4">

    {{-- Cabeçalho do Projeto --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ $projeto->nome }}</h2>

        <div>
            <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-warning">Editar Dados</a>
            <a href="{{ route('projetos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    {{-- Informações principais --}}
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header card-header-color">Status</div>
                <div class="card-body">
                    <p>{{ $projeto->status }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header card-header-color">Progresso</div>
                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar"
                             style="width: {{ $projeto->percentual_concluido }}%">
                            {{ $projeto->percentual_concluido }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- Seção: Atividades --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header card-header-color d-flex justify-content-between">
            <span>Atividades</span>
            <a href="{{ route('projeto-atividades.create', $projeto->id) }}" class="btn btn-blue btn-sm">+ Adicionar</a>
        </div>

        <div class="card-body p-0">
            @if($projeto->atividades->isEmpty())
                <p class="p-3 mb-0 text-center">Nenhuma atividade cadastrada.</p>
            @else
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Atividade</th>
                        <th>Responsável</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projeto->atividades as $a)
                    <tr>
                        <td>{{ $a->nome }}</td>
                        <td>{{ $a->responsavel }}</td>
                        <td>{{ $a->status }}</td>
                        <td class="text-end">
                            <a href="{{ route('projeto-atividades.edit', [$projeto->id, $a->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form class="d-inline" action="{{ route('projeto-atividades.destroy', [$projeto->id, $a->id]) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir atividade?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>


    {{-- Metas / Indicadores / Cronograma serão criados aqui também --}}
    {{-- Posso gerar todas as seções completas caso deseje! --}}

</div>
@endsection