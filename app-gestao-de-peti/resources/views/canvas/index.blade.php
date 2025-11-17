@extends('layouts.app')
@section('title', 'Business Model Canvas')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/canvas.css') }}">
@endsection

@section('content')
<div class="container-fluid mt-4 mb-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Business Model Canvas</h2>
        <a href="{{ route('canvas.edit') }}" class="btn btn-blue">Editar Business Model Canvas</a>
    </div>

    {{-- 
      O layout do Canvas é definido pelo CSS Grid.
      A ordem no HTML está organizada para acessibilidade e para o layout mobile (coluna única).
    --}}
    <div class="canvas-container">

        {{-- BLOCO 1: PARCERIAS CHAVE --}}
        <div class="canvas-block bg-blue block-parcerias">
            <div class="canvas-title">Parcerias Chave</div>
            <ul>
                @forelse($canvas->parcerias_chave ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhuma parceria definida.</li>
                @endforelse
            </ul>
        </div>

        {{-- BLOCO 2: ATIVIDADES CHAVE --}}
        <div class="canvas-block bg-green block-atividades">
            <div class="canvas-title">Atividades Chave</div>
            <ul>
                @forelse($canvas->atividades_chave ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhuma atividade definida.</li>
                @endforelse
            </ul>
        </div>

        {{-- BLOCO 3: PROPOSTA DE VALOR (Central) --}}
        <div class="canvas-block bg-yellow block-proposta">
            <div class="canvas-title">Proposta de Valor</div>
            <ul>
                @forelse($canvas->proposta_valor ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhuma proposta definida.</li>
                @endforelse
            </ul>
        </div>

        {{-- BLOCO 4: RELACIONAMENTO COM CLIENTES --}}
        <div class="canvas-block bg-pink block-relacionamento">
            <div class="canvas-title">Relacionamento com Clientes</div>
            <ul>
                @forelse($canvas->relacionamento_clientes ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhum relacionamento definido.</li>
                @endforelse
            </ul>
        </div>

        {{-- BLOCO 5: SEGMENTOS DE CLIENTES --}}
        <div class="canvas-block bg-blue block-segmentos">
            <div class="canvas-title">Segmentos de Clientes</div>
            <ul>
                @forelse($canvas->segmentos_clientes ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhum segmento definido.</li>
                @endforelse
            </ul>
        </div>

        {{-- BLOCO 6: RECURSOS CHAVE --}}
        <div class="canvas-block bg-orange block-recursos">
            <div class="canvas-title">Recursos Chave</div>
            <ul>
                @forelse($canvas->recursos_chave ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhum recurso definido.</li>
                @endforelse
            </ul>
        </div>

        {{-- BLOCO 7: CANAIS --}}
        <div class="canvas-block bg-green block-canais">
            <div class="canvas-title">Canais</div>
            <ul>
                @forelse($canvas->canais_distribuicao ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhum canal definido.</li>
                @endforelse
            </ul>
        </div>

        {{-- BLOCO 8: ESTRUTURA DE CUSTOS --}}
        <div class="canvas-block bg-yellow block-custos">
            <div class="canvas-title">Estrutura de Custos</div>
            <ul>
                @forelse($canvas->estrutura_custos ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhum custo definido.</li>
                @endforelse
            </ul>
        </div>
        
        {{-- BLOCO 9: FONTES DE RECEITA --}}
        <div class="canvas-block bg-orange block-receita">
            <div class="canvas-title">Fontes de Receita</div>
            <ul>
                @forelse($canvas->fontes_receita ?? [] as $item)
                    <li>{{ $item }}</li>
                @empty
                    <li class="empty-item">Nenhuma receita definida.</li>
                @endforelse
            </ul>
        </div>

    </div>

</div>
@endsection