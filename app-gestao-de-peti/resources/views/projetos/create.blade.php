@extends('layouts.app')
@section('title', 'Novo Projeto')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Cadastrar Novo Projeto</h2>

    <form action="{{ route('projetos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="fw-bold">Nome do Projeto</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="fw-bold">Status Inicial</label>
                <select name="status" class="form-control">
                    <option>Pendente</option>
                    <option>Em andamento</option>
                    <option>Concluído</option>
                </select>
            </div>
        </div>

        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('projetos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection