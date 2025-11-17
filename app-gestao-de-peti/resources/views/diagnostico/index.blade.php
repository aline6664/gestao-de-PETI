@extends('layouts.app')
@section('title', 'Detalhes do Diagnóstico')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/diagnostico.css') }}">
@endsection

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="mb-2">
            <h2>Diagnóstico de TI — {{ $empresa->nome_empresa }}</h2>
            <strong>Nível de Maturidade:</strong> {{ $diagnostico->nivel_maturidade ?? '—' }}
                <br>
            <small class="text-muted">Criado em: {{ $diagnostico->created_at->format('d/m/Y H:i') }}</small>
        </div>
        <a href="{{ route('diagnostico.edit') }}" class="btn btn-blue mt-3">Editar informações</a>
    </div>

    {{-- ====================== SWOT EM COLUNAS ====================== --}}
    <div class="row g-3">

        {{-- FORÇAS --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Forças</h5>
                </div>
                <table class="table table-sm table-bordered mb-0 table-hover">
                    <tbody>
                        @foreach($diagnostico->forcas ?? [] as $i => $item)
                        <tr>
                            <td class="bg-light fw-bold" style="width:40px;">{{ $i+1 }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                        @endforeach
                        @if(empty($diagnostico->forcas))
                        <tr><td colspan="2" class="text-center text-muted">Nenhum item</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- FRAQUEZAS --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Fraquezas</h5>
                </div>
                <table class="table table-sm table-bordered mb-0 table-hover">
                    <tbody>
                        @foreach($diagnostico->fraquezas ?? [] as $i => $item)
                        <tr>
                            <td class="bg-light fw-bold" style="width:40px;">{{ $i+1 }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                        @endforeach
                        @if(empty($diagnostico->fraquezas))
                        <tr><td colspan="2" class="text-center text-muted">Nenhum item</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- OPORTUNIDADES --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Oportunidades</h5>
                </div>
                <table class="table table-sm table-bordered mb-0 table-hover">
                    <tbody>
                        @foreach($diagnostico->oportunidades ?? [] as $i => $item)
                        <tr>
                            <td class="bg-light fw-bold" style="width:40px;">{{ $i+1 }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                        @endforeach
                        @if(empty($diagnostico->oportunidades))
                        <tr><td colspan="2" class="text-center text-muted">Nenhum item</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- AMEAÇAS --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Ameaças</h5>
                </div>
                <table class="table table-sm table-bordered mb-0 table-hover">
                    <tbody>
                        @foreach($diagnostico->ameacas ?? [] as $i => $item)
                        <tr>
                            <td class="bg-light fw-bold" style="width:40px;">{{ $i+1 }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                        @endforeach
                        @if(empty($diagnostico->ameacas))
                        <tr><td colspan="2" class="text-center text-muted">Nenhum item</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ====================== GRAFICO SWOT ====================== --}}
    <h4 class="text-center mt-4">Gráfico da Matriz SWOT</h4>

    <div class="card shadow-sm mx-auto mb-4" style="max-width: 800px;">
        <div class="card-body p-3">
            <canvas id="swotChart" width="220" height="300" style="max-width:100%;"></canvas>
        </div>
    </div>

    {{-- ====================== RECURSOS E RISCOS ====================== --}}
    <div class="row g-3 mb-4">
        {{-- Recursos --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header card-header-color">
                    <h5 class="mb-0">Recursos de TI</h5>
                </div>
                <table class="table table-sm table-bordered mb-0 table-hover">
                    <tbody>
                        @foreach($diagnostico->recursos_ti ?? [] as $i => $item)
                        <tr>
                            <td class="bg-light fw-bold" style="width:40px;">{{ $i+1 }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                        @endforeach
                        @if(empty($diagnostico->recursos_ti))
                        <tr><td colspan="2" class="text-center text-muted">Nenhum item</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Riscos --}}
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header card-header-color">
                    <h5 class="mb-0">Riscos</h5>
                </div>
                <table class="table table-sm table-bordered mb-0 table-hover">
                    <tbody>
                        @foreach($diagnostico->riscos ?? [] as $i => $item)
                        <tr>
                            <td class="bg-light fw-bold" style="width:40px;">{{ $i+1 }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                        @endforeach
                        @if(empty($diagnostico->riscos))
                        <tr><td colspan="2" class="text-center text-muted">Nenhum item</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


{{-- ===================== CHART JS ===================== --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('swotChart').getContext('2d');

    const dados = {
        forcas: {{ count($diagnostico->forcas) }},
        fraquezas: {{ count($diagnostico->fraquezas) }},
        oportunidades: {{ count($diagnostico->oportunidades) }},
        ameacas: {{ count($diagnostico->ameacas) }}
    };

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Forças', 'Fraquezas', 'Oportunidades', 'Ameaças'],
            datasets: [{
                data: [dados.forcas, dados.fraquezas, dados.oportunidades, dados.ameacas],
                backgroundColor: [
                    'rgba(40,167,69,0.75)',
                    'rgba(220,53,69,0.75)',
                    'rgba(0,123,255,0.75)',
                    'rgba(255,193,7,0.75)'
                ],
                borderColor: '#444',
                borderWidth: 1,
                barThickness: 40
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
                    font: { size: 17 },
                    padding: { top: 4, bottom: 4 }
                },
                legend: { display: false }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: { font: { size: 15 }, precision: 0 }
                },
                y: {
                    ticks: { font: { size: 14 } }
                }
            },
            layout: { padding: 4 }
        }
    });
});
</script>

@endsection
