@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">Business Model Canvas</h1>

    <a href="{{ route('canvas.edit') }}" class="btn btn-primary mb-3">
        Editar Canvas
    </a>

    <div class="row">

        @php
            $boxStyle = "border: 1px solid #ddd; border-radius: 8px; padding: 15px; background: white;";
            $titleStyle = "font-weight: bold; font-size: 18px; margin-bottom: 10px;";
        @endphp

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Proposta de Valor</div>
                <div>{{ $canvas->proposta_valor ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Segmentos de Clientes</div>
                <div>{{ $canvas->segmentos_clientes ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Canais de Distribuição</div>
                <div>{{ $canvas->canais_distribuicao ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Relacionamento com Clientes</div>
                <div>{{ $canvas->relacionamento_clientes ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Fontes de Receita</div>
                <div>{{ $canvas->fontes_receita ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Recursos-chave</div>
                <div>{{ $canvas->recursos_chave ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Atividades-chave</div>
                <div>{{ $canvas->atividades_chave ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Parcerias-chave</div>
                <div>{{ $canvas->parcerias_chave ?? '—' }}</div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div style="{{ $boxStyle }}">
                <div style="{{ $titleStyle }}">Estrutura de Custos</div>
                <div>{{ $canvas->estrutura_custos ?? '—' }}</div>
            </div>
        </div>

    </div>
</div>

@endsection
