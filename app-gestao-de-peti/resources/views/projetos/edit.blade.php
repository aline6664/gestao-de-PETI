@extends('layouts.app')
@section('title', 'Editar Projeto')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Editar Projeto</h2>

    <form action="{{ route('projetos.update', $projeto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="fw-bold">Nome do Projeto</label>
            <input type="text" name="nome" class="form-control" required
                value="{{ old('nome', $projeto->nome) }}">
        </div>

        <div class="mb-3">
            <label class="fw-bold">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3">{{ old('descricao', $projeto->descricao) }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="fw-bold">Status</label>
                <select name="status" class="form-control">
                    <option {{ $projeto->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                    <option {{ $projeto->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                    <option {{ $projeto->status == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                </select>
            </div>
        </div>

        <button class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('projetos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection