@extends('layouts.app')
@section('title', 'Editar Canvas')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/canvas.css') }}">
@endsection

@section('content')
<div class="container-fluid mt-3 mb-5 p-4">

    <h2 class="mb-4">Editar Business Model Canvas</h2>

    <form action="{{ route('canvas.update', 1) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- === Usa o MESMO GRID da visualização === --}}
        <div class="canvas-container">

            {{-- ========== PARCERIAS CHAVE ========== --}}
            <div class="canvas-block bg-blue block-parcerias">
                <div class="canvas-title">Parcerias Chave</div>

                <div id="parcerias_chave-list">
                    @foreach($canvas->parcerias_chave ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="parcerias_chave[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="parcerias_chave">+ Adicionar</button>
            </div>

            {{-- ========== ATIVIDADES CHAVE ========== --}}
            <div class="canvas-block bg-green block-atividades">
                <div class="canvas-title">Atividades Chave</div>

                <div id="atividades_chave-list">
                    @foreach($canvas->atividades_chave ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="atividades_chave[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="atividades_chave">+ Adicionar</button>
            </div>

            {{-- ========== PROPOSTA DE VALOR ========== --}}
            <div class="canvas-block bg-yellow block-proposta">
                <div class="canvas-title">Proposta de Valor</div>

                <div id="proposta_valor-list">
                    @foreach($canvas->proposta_valor ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="proposta_valor[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="proposta_valor">+ Adicionar</button>
            </div>

            {{-- ========== RELACIONAMENTO COM CLIENTES ========== --}}
            <div class="canvas-block bg-pink block-relacionamento">
                <div class="canvas-title">Relacionamento com Clientes</div>

                <div id="relacionamento_clientes-list">
                    @foreach($canvas->relacionamento_clientes ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="relacionamento_clientes[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="relacionamento_clientes">+ Adicionar</button>
            </div>

            {{-- ========== SEGMENTOS DE CLIENTES ========== --}}
            <div class="canvas-block bg-blue block-segmentos">
                <div class="canvas-title">Segmentos de Clientes</div>

                <div id="segmentos_clientes-list">
                    @foreach($canvas->segmentos_clientes ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="segmentos_clientes[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="segmentos_clientes">+ Adicionar</button>
            </div>

            {{-- ========== RECURSOS CHAVE ========== --}}
            <div class="canvas-block bg-orange block-recursos">
                <div class="canvas-title">Recursos Chave</div>

                <div id="recursos_chave-list">
                    @foreach($canvas->recursos_chave ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="recursos_chave[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="recursos_chave">+ Adicionar</button>
            </div>

            {{-- ========== CANAIS DE DISTRIBUIÇÃO ========== --}}
            <div class="canvas-block bg-green block-canais">
                <div class="canvas-title">Canais de Distribuição</div>

                <div id="canais_distribuicao-list">
                    @foreach($canvas->canais_distribuicao ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="canais_distribuicao[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="canais_distribuicao">+ Adicionar</button>
            </div>

            {{-- ========== ESTRUTURA DE CUSTOS ========== --}}
            <div class="canvas-block bg-yellow block-custos">
                <div class="canvas-title">Estrutura de Custos</div>

                <div id="estrutura_custos-list">
                    @foreach($canvas->estrutura_custos ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="estrutura_custos[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="estrutura_custos">+ Adicionar</button>
            </div>

            {{-- ========== FONTES DE RECEITA ========== --}}
            <div class="canvas-block bg-orange block-receita">
                <div class="canvas-title">Fontes de Receita</div>

                <div id="fontes_receita-list">
                    @foreach($canvas->fontes_receita ?? [] as $item)
                        <div class="input-group mb-2">
                            <input type="text" name="fontes_receita[]" value="{{ $item }}" class="form-control">
                            <button type="button" class="btn btn-danger remover-item">X</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn btn-primary add-item" data-target="fontes_receita">+ Adicionar</button>
            </div>

        </div>

        <button class="btn btn-success mt-4">Salvar Alterações</button>
        <a href="{{ route('canvas.index') }}" class="btn btn-secondary mt-4">Voltar</a>
    </form>
</div>

{{-- JS de adicionar / remover campos --}}
<script>
document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll('.add-item').forEach(btn => {
        btn.addEventListener('click', () => {
            const field = btn.dataset.target;
            const list = document.getElementById(`${field}-list`);

            const div = document.createElement('div');
            div.classList.add('input-group','mb-2');

            div.innerHTML = `
                <input type="text" name="${field}[]" class="form-control">
                <button type="button" class="btn btn-danger remover-item">X</button>
            `;

            list.appendChild(div);
        });
    });

    document.addEventListener('click', e => {
        if (e.target.classList.contains('remover-item')) {
            e.target.closest('.input-group').remove();
        }
    });

});
</script>

@endsection