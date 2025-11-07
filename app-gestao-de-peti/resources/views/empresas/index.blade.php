@extends('layouts.app') {{-- Pegando do template --}}
@section('title', 'Empresas') {{-- Mudando o Título da página --}}

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Empresas</h2>
    <a href="{{ route('empresas.create') }}" class="btn btn-primary">+ Nova Empresa</a>
</div>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $empresa)
        <tr>
            <td>{{ $empresa->nome_empresa }}</td>
            <td>{{ $empresa->cnpj }}</td>
            <td>{{ $empresa->email_contato }}</td>
            <td>
                <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir empresa?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection