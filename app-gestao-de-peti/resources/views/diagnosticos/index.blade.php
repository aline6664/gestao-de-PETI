@extends('layouts.app')
@section('title', 'Diagnósticos de TI')

@section('content')
<div class="container">
    <h2 class="mb-4">Diagnósticos de TI</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('diagnosticos.create') }}" class="btn btn-primary mb-3">+ Novo Diagnóstico</a>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Empresa</th>
                <th>Nível de Maturidade</th>
                <th>Forças</th>
                <th>Fraquezas</th>
                <th style="width: 180px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($diagnosticos as $diagnostico)
                <tr>
                    <td>{{ $diagnostico->id }}</td>
                    <td>{{ $diagnostico->empresa->nome_empresa ?? '—' }}</td>
                    <td>{{ $diagnostico->nivel_maturidade ?? '—' }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($diagnostico->forcas, 40) }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($diagnostico->fraquezas, 40) }}</td>
                    <td>
                        <a href="{{ route('diagnosticos.show', $diagnostico->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('diagnosticos.edit', $diagnostico->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('diagnosticos.destroy', $diagnostico->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este diagnóstico?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Nenhum diagnóstico cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
