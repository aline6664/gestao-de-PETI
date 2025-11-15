@extends('layouts.app')
@section('title', 'Detalhes do Diagnóstico')

@section('content')
<div class="container">
    <h2 class="mb-4">
        Diagnóstico de TI — {{ $empresa->nome_empresa }}
    </h2>

    <div class="mb-3">
        <strong>Nível de Maturidade:</strong> {{ $diagnostico->nivel_maturidade ?? '—' }}
        <br>
        <small class="text-muted">Criado em: {{ $diagnostico->created_at->format('d/m/Y H:i') }}</small>
    </div>

    {{-- ===================== SEÇÃO SWOT ===================== --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Análise SWOT</h5>
        </div>
        <div class="card-body">
            <p><strong>Forças:</strong><br> {!! nl2br(e($diagnostico->forcas ?? '—')) !!}</p>
            <p><strong>Fraquezas:</strong><br> {!! nl2br(e($diagnostico->fraquezas ?? '—')) !!}</p>
            <p><strong>Oportunidades:</strong><br> {!! nl2br(e($diagnostico->oportunidades ?? '—')) !!}</p>
            <p><strong>Ameaças:</strong><br> {!! nl2br(e($diagnostico->ameacas ?? '—')) !!}</p>

            {{-- ======= GRÁFICO SWOT (compacto) ======= --}}
            <h6 class="text-center mt-4 mb-2">Gráfico da Matriz SWOT</h6>
            <div class="text-center mb-3">
                <div class="card shadow-sm mx-auto" style="max-width: 600px;">
                    <div class="card-body p-2">
                        <canvas id="swotChart" width="220" height="150" style="max-width: 100%; height: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== SEÇÃO RECURSOS ===================== --}}
    <div class="card mb-3">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Recursos de TI</h5>
        </div>
        <div class="card-body">
            <p>{{ $diagnostico->recursos_ti ?? '—' }}</p>
        </div>
    </div>

    {{-- ===================== SEÇÃO RISCOS ===================== --}}
    <div class="card mb-3">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Riscos Identificados</h5>
        </div>
        <div class="card-body">
            <p>{{ $diagnostico->riscos ?? '—' }}</p>
        </div>
    </div>

    <a href="{{ route('diagnostico.edit') }}" class="btn btn-secondary mt-3">Editar</a>
</div>

{{-- ===================== CHART.JS ===================== --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('swotChart').getContext('2d');

    function contarItens(texto) {
        if (!texto) return 0;
        const linhas = texto.split(/\r?\n/).filter(l => l.trim() !== '');
        return linhas.length > 0 ? linhas.length : 1;
    }

    const dados = {
        forcas: contarItens(`{{ $diagnostico->forcas }}`),
        fraquezas: contarItens(`{{ $diagnostico->fraquezas }}`),
        oportunidades: contarItens(`{{ $diagnostico->oportunidades }}`),
        ameacas: contarItens(`{{ $diagnostico->ameacas }}`)
    };

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Forças', 'Fraquezas', 'Oportunidades', 'Ameaças'],
            datasets: [{
                label: 'Qtd. de Itens',
                data: [dados.forcas, dados.fraquezas, dados.oportunidades, dados.ameacas],
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
                x: {
                    beginAtZero: true,
                    ticks: { font: { size: 10 }, precision: 0 }
                },
                y: {
                    ticks: { font: { size: 11 } }
                }
            },
            layout: { padding: 4 }
        }
    });
});
</script>
@endsection
