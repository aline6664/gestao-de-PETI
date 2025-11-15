@extends('layouts.app')
@section('title', 'Editar Diagnóstico de TI')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Diagnóstico de TI</h2>
    <p class="text-muted">Atualize as informações do diagnóstico da empresa selecionada.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('diagnostico.update', $diagnostico->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h4 class="mt-4">Análise SWOT</h4>
        <div class="mb-3">
            <label>Forças</label>
            <textarea id="forcas" name="forcas" class="form-control">{{ $diagnostico->forcas }}</textarea>
        </div>
        <div class="mb-3">
            <label>Fraquezas</label>
            <textarea id="fraquezas" name="fraquezas" class="form-control">{{ $diagnostico->fraquezas }}</textarea>
        </div>
        <div class="mb-3">
            <label>Oportunidades</label>
            <textarea id="oportunidades" name="oportunidades" class="form-control">{{ $diagnostico->oportunidades }}</textarea>
        </div>
        <div class="mb-3">
            <label>Ameaças</label>
            <textarea id="ameacas" name="ameacas" class="form-control">{{ $diagnostico->ameacas }}</textarea>
        </div>

        {{-- ====== GRÁFICO SWOT ====== --}}
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Visualização da Matriz SWOT</h5>
            </div>
            <div class="card-body">
                <canvas id="swotChart" width="400" height="250"></canvas>
            </div>
        </div>

        <h4 class="mt-4">Maturidade e Recursos</h4>
        <div class="mb-3">
            <label>Nível de Maturidade</label>
            <select name="nivel_maturidade" class="form-control">
                @foreach(['Inicial','Repetível','Definido','Gerenciado','Otimizado'] as $nivel)
                    <option value="{{ $nivel }}" {{ $diagnostico->nivel_maturidade == $nivel ? 'selected' : '' }}>
                        {{ $nivel }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Recursos de TI</label>
            <textarea name="recursos_ti" class="form-control">{{ $diagnostico->recursos_ti }}</textarea>
        </div>

        <h4 class="mt-4">Riscos</h4>
        <div class="mb-3">
            <label>Riscos Identificados</label>
            <textarea name="riscos" class="form-control">{{ $diagnostico->riscos }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('diagnostico.index') }}" class="btn btn-secondary">Voltar</a>
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
                label: 'Qtd. de Itens',
                data: dadosAtuais(),
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)'
                ],
                borderColor: '#444',
                borderWidth: 1
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
                    padding: { top: 5, bottom: 5 }
                },
                legend: { display: false }
            },
            scales: {
                x: { beginAtZero: true, ticks: { font: { size: 10 } } },
                y: { ticks: { font: { size: 11 } } }
            },
            layout: { padding: 5 }
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
