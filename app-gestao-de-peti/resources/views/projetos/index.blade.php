@extends('layouts.app')
@section('title', 'Projetos')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/projetos.css') }}">
@endsection

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Projetos</h2>
        <a href="{{ route('projetos.create') }}" class="btn btn-blue">Novo Projeto</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header card-header-color">Lista de Projetos</div>
        <div class="card-body p-0">
            @if($projetos->isEmpty())
                <p class="text-center p-3 mb-0">Nenhum projeto cadastrado.</p>
            @else
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Responsável</th>
                        <th>Progresso</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projetos as $projeto)
                    <tr>
                        <td>{{ $projeto->nome }}</td>
                        <td>{{ $projeto->status }}</td>
                        <td>{{ $projeto->percentual_concluido }}%</td>
                        <td class="text-end">
                            <a href="{{ route('projetos.show', $projeto->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir este projeto?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

</div>
@endsection