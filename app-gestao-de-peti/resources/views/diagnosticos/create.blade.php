@extends('layouts.app')
@section('title', 'Novo Diagnóstico de TI')

@section('content')
<div class="container">
    <h2 class="mb-4">Novo Diagnóstico de TI</h2>
    <p class="text-muted">Objetivo: levantar a situação atual da empresa e da área de TI.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('diagnosticos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Empresa</label>
            <select name="empresa_id" class="form-control" required>
                <option value="">Selecione uma empresa...</option>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ old('empresa_id') == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->nome_empresa }}
                    </option>
                @endforeach
            </select>
        </div>

        <h4 class="mt-4">Análise SWOT</h4>
        <p class="text-muted"><small>Cada linha (pressionar Enter) adiciona um novo item ao gráfico automaticamente.</small></p>

        <div class="mb-3">
            <label>Forças</label>
            <textarea id="forcas" name="forcas" class="form-control" rows="3">{{ old('forcas') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Fraquezas</label>
            <textarea id="fraquezas" name="fraquezas" class="form-control" rows="3">{{ old('fraquezas') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Oportunidades</label>
            <textarea id="oportunidades" name="oportunidades" class="form-control" rows="3">{{ old('oportunidades') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Ameaças</label>
            <textarea id="ameacas" name="ameacas" class="form-control" rows="3">{{ old('ameacas') }}</textarea>
        </div>

        {{-- ====== GRÁFICO SWOT ====== --}}
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Visualização da Matriz SWOT</h5>
            </div>
            <div class="card-body">
                <canvas id="swotChart" height="280"></canvas>
            </div>
        </div>

        <h4 class="mt-4">Maturidade e Recursos</h4>
        <div class="mb-3">
            <label>Nível de Maturidade</label>
            <select name="nivel_maturidade" class="form-control">
                <option value="">Selecione...</option>
                @foreach(['Inicial', 'Repetível', 'Definido', 'Gerenciado', 'Otimizado'] as $nivel)
                    <option value="{{ $nivel }}" {{ old('nivel_maturidade') == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Recursos de TI</label>
            <textarea name="recursos_ti" class="form-control">{{ old('recursos_ti') }}</textarea>
        </div>

        <h4 class="mt-4">Riscos</h4>
        <div class="mb-3">
            <label>Riscos Identificados</label>
            <textarea name="riscos" class="form-control">{{ old('riscos') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

{{-- Script do gráfico SWOT --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('swotChart').getContext('2d');

    function contarItens(texto) {
        if (!texto) return 0;
        return texto.split(/\r?\n/).filter(l => l.trim() !== '').length || 0;
    }

    const campos = {
        forcas: document.getElementById('forcas'),
        fraquezas: document.getElementById('fraquezas'),
        oportunidades: document.getElementById('oportunidades'),
        ameacas: document.getElementById('ameacas')
    };

    function dadosAtuais() {
        return [
            contarItens(campos.forcas.value),
            contarItens(campos.fraquezas.value),
            contarItens(campos.oportunidades.value),
            contarItens(campos.ameacas.value)
        ];
    }

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Forças', 'Fraquezas', 'Oportunidades', 'Ameaças'],
            datasets: [{
                label: 'Qtd. de Itens',
                data: dadosAtuais(),
                backgroundColor: [
                    'rgba(75, 192, 192, 0.75)',
                    'rgba(255, 99, 132, 0.75)',
                    'rgba(54, 162, 235, 0.75)',
                    'rgba(255, 206, 86, 0.75)'
                ],
                borderColor: '#444',
                borderWidth: 1,
                barThickness: 25
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribuição SWOT',
                    font: { size: 13 },
                    padding: { top: 4, bottom: 4 }
                },
                legend: { display: false }
            },
            scales: {
                x: { beginAtZero: true, ticks: { font: { size: 10 } } },
                y: { ticks: { font: { size: 11 } } }
            },
            layout: { padding: 4 }
        }
    });

    Object.values(campos).forEach(campo => {
        campo.addEventListener('input', () => {
            chart.data.datasets[0].data = dadosAtuais();
            chart.update('none');
        });
    });
});
</script>
@endsection
