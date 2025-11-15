@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">Editar Canvas</h1>

    <form action="{{ route('canvas.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            @php
                $textarea = 'class="form-control" rows="3"';
            @endphp

            <div class="col-md-4 mb-3">
                <label>Proposta de Valor</label>
                <textarea name="proposta_valor" {!! $textarea !!}>{{ $canvas->proposta_valor }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Segmentos de Clientes</label>
                <textarea name="segmentos_clientes" {!! $textarea !!}>{{ $canvas->segmentos_clientes }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Canais de Distribuição</label>
                <textarea name="canais_distribuicao" {!! $textarea !!}>{{ $canvas->canais_distribuicao }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Relacionamento com Clientes</label>
                <textarea name="relacionamento_clientes" {!! $textarea !!}>{{ $canvas->relacionamento_clientes }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Fontes de Receita</label>
                <textarea name="fontes_receita" {!! $textarea !!}>{{ $canvas->fontes_receita }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Recursos-chave</label>
                <textarea name="recursos_chave" {!! $textarea !!}>{{ $canvas->recursos_chave }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Atividades-chave</label>
                <textarea name="atividades_chave" {!! $textarea !!}>{{ $canvas->atividades_chave }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Parcerias-chave</label>
                <textarea name="parcerias_chave" {!! $textarea !!}>{{ $canvas->parcerias_chave }}</textarea>
            </div>

            <div class="col-md-4 mb-3">
                <label>Estrutura de Custos</label>
                <textarea name="estrutura_custos" {!! $textarea !!}>{{ $canvas->estrutura_custos }}</textarea>
            </div>

        </div>

        <button class="btn btn-success">Salvar</button>

        <a href="{{ route('canvas.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

</div>

@endsection