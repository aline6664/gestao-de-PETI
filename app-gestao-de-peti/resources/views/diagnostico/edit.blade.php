@extends('layouts.app')
@section('title', 'Editar Diagnóstico de TI')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Diagnóstico de TI</h2>
    <p class="text-muted">Atualize as informações do diagnóstico da empresa.</p>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('diagnostico.update', $diagnostico->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- ===================== FORÇAS E FRAQUEZAS ===================== --}}
        <div class="row">
            {{-- FORÇAS --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold" style="font-size: 20px">Forças</label>
                <div id="forcas-list">
                    @foreach($diagnostico->forcas ?? [] as $item)
                    <div class="input-group mb-2">
                        <input type="text" name="forcas[]" class="form-control" value="{{ $item }}">
                        <button type="button" class="btn btn-danger remover-item">X</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary add-item" data-target="forcas">+ Adicionar</button>
            </div>

            {{-- FRAQUEZAS --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold" style="font-size: 20px">Fraquezas</label>
                <div id="fraquezas-list">
                    @foreach($diagnostico->fraquezas ?? [] as $item)
                    <div class="input-group mb-2">
                        <input type="text" name="fraquezas[]" class="form-control" value="{{ $item }}">
                        <button type="button" class="btn btn-danger remover-item">X</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary add-item" data-target="fraquezas">+ Adicionar</button>
            </div>
        </div>

        {{-- ===================== OPORTUNIDADES E AMEAÇAS ===================== --}}
        <div class="row">
            {{-- OPORTUNIDADES --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold" style="font-size: 20px">Oportunidades</label>
                <div id="oportunidades-list">
                    @foreach($diagnostico->oportunidades ?? [] as $item)
                    <div class="input-group mb-2">
                        <input type="text" name="oportunidades[]" class="form-control" value="{{ $item }}">
                        <button type="button" class="btn btn-danger remover-item">X</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary add-item" data-target="oportunidades">+ Adicionar</button>
            </div>

            {{-- AMEAÇAS --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold" style="font-size: 20px">Ameaças</label>
                <div id="ameacas-list">
                    @foreach($diagnostico->ameacas ?? [] as $item)
                    <div class="input-group mb-2">
                        <input type="text" name="ameacas[]" class="form-control" value="{{ $item }}">
                        <button type="button" class="btn btn-danger remover-item">X</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary add-item" data-target="ameacas">+ Adicionar</button>
            </div>
        </div>

        {{-- ===================== GRÁFICO SWOT ===================== --}}
        <div class="my-4">
            <h5 class="text-center mb-2">Gráfico SWOT (Preview)</h5>
            <div class="card shadow-sm mx-auto mb-4" style="max-width: 800px;">
                <div class="card-body">
                    <canvas id="swotChart"  width="220" height="300" style="max-width:100%;"></canvas>
                </div>
            </div>
        </div>

        {{-- ===================== RECURSOS E RISCOS ===================== --}}
        <div class="row">
            {{-- RECURSOS --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold" style="font-size: 20px">Recursos de TI</label>
                <div id="recursos_ti-list">
                    @foreach($diagnostico->recursos_ti ?? [] as $item)
                    <div class="input-group mb-2">
                        <input type="text" name="recursos_ti[]" class="form-control" value="{{ $item }}">
                        <button type="button" class="btn btn-danger remover-item">X</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary add-item" data-target="recursos_ti">+ Adicionar</button>
            </div>

            {{-- RISCOS --}}
            <div class="col-md-6 mb-3">
                <label class="fw-bold" style="font-size: 20px">Riscos</label>
                <div id="riscos-list">
                    @foreach($diagnostico->riscos ?? [] as $item)
                    <div class="input-group mb-2">
                        <input type="text" name="riscos[]" class="form-control" value="{{ $item }}">
                        <button type="button" class="btn btn-danger remover-item">X</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary add-item" data-target="riscos">+ Adicionar</button>
            </div>
        </div>

        {{-- ===================== BOTÕES ===================== --}}
        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('diagnostico.index') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
    </form>
    
</div>

{{-- ===================== CHART.JS ===================== --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    function contarItens(selector) {
        const inputs = document.querySelectorAll(`#${selector}-list input`);
        let total = 0;

        inputs.forEach(input => {
            if (input.value.trim() !== "") {
                total++;
            }
        });

        return total;
    }

    const ctx = document.getElementById('swotChart').getContext('2d');

    let chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Forças', 'Fraquezas', 'Oportunidades', 'Ameaças'],
            datasets: [{
                data: [
                    contarItens('forcas'),
                    contarItens('fraquezas'),
                    contarItens('oportunidades'),
                    contarItens('ameacas')
                ],
                backgroundColor: [
                    'rgba(40,167,69,0.75)',
                    'rgba(220,53,69,0.75)',
                    'rgba(0,123,255,0.75)',
                    'rgba(255,193,7,0.75)'
                ],
                borderColor: '#333',
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

    function atualizarGrafico() {
        chart.data.datasets[0].data = [
            contarItens('forcas'),
            contarItens('fraquezas'),
            contarItens('oportunidades'),
            contarItens('ameacas')
        ];
        chart.update();
    }

    // Ao adicionar item
    document.querySelectorAll('.add-item').forEach(btn => {
        btn.addEventListener('click', function() {
            const target = btn.dataset.target;
            const list = document.getElementById(`${target}-list`);

            const linha = document.createElement('div');
            linha.classList.add('input-group', 'mb-2');
            linha.innerHTML = `
                <input type="text" name="${target}[]" class="form-control">
                <button type="button" class="btn btn-danger remover-item">X</button>
            `;
            list.appendChild(linha);

            // Atualiza apenas quando o usuário digitar algo
            linha.querySelector("input").addEventListener("input", atualizarGrafico);
        });
    });

    // Ao remover item
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remover-item')) {
            e.target.closest('.input-group').remove();
            atualizarGrafico();
        }
    });
});
</script>

@endsection