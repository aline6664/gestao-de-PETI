@extends('layouts.app')
@section('title', 'Editar Diagnóstico de TI')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Diagnóstico de TI</h2>
    <p class="text-muted">Atualize as informações e visualize as mudanças no gráfico abaixo.<br>
    <small>Cada linha (pressionar Enter) adiciona um novo item ao gráfico automaticamente.</small></p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('diagnosticos.update', $diagnostico->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Empresa</label>
            <select name="empresa_id" class="form-control" required>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ $diagnostico->empresa_id == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->nome_empresa }}
                    </option>
                @endforeach
            </select>
        </div>

        <h4 class="mt-4">Análise SWOT</h4>
        <div class="mb-3">
            <label>Forças</label>
            <textarea id="forcas" name="forcas" class="form-control" rows="3">{{ $diagnostico->forcas }}</textarea>
        </div>
        <div class="mb-3">
            <label>Fraquezas</label>
            <textarea id="fraquezas" name="fraquezas" class="form-control" rows="3">{{ $diagnostico->fraquezas }}</textarea>
        </div>
        <div class="mb-3">
            <label>Oportunidades</label>
            <textarea id="oportunidades" name="oportunidades" class="form-control" rows="3">{{ $diagnostico->oportunidades }}</textarea>
        </div>
        <div class="mb-3">
            <label>Ameaças</label>
            <textarea id="ameacas" name="ameacas" class="form-control" rows="3">{{ $diagnostico->ameacas }}</textarea>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Visualização da Matriz SWOT</h5>
            </div>
            <div class="card-body">
                <canvas id="swotChart" height="280"></canvas>
            </div>
        </div>

        <div class="mt-4">
            <label>Nível de Maturidade</label>
            <select name="nivel_maturidade" class="form-control mb-3">
                @foreach(['Inicial','Repetível','Definido','Gerenciado','Otimizado'] as $nivel)
                    <option value="{{ $nivel }}" {{ $diagnostico->nivel_maturidade == $nivel ? 'selected' : '' }}>{{ $nivel }}</option>
                @endforeach
            </select>

            <label>Recursos de TI</label>
            <textarea name="recursos_ti" class="form-control mb-3">{{ $diagnostico->recursos_ti }}</textarea>

            <label>Riscos Identificados</label>
            <textarea name="riscos" class="form-control mb-4">{{ $diagnostico->riscos }}</textarea>

            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('diagnosticos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

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
                label: 'Itens SWOT',
                data: dadosAtuais(),
                backgroundColor: [
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)'
                ],
                borderColor: '#333',
                borderWidth: 1,
                barThickness: 40
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribuição Atual SWOT',
                    font: { size: 16 }
                },
                legend: { display: false }
            },
            scales: {
                x: { beginAtZero: true },
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
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
