<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema PETI')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @yield('styles')
</head>

<body class="bg-light">

    {{-- Navbar principal --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold logo" href="{{ url('/home') }}">Painel de Controle PETI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Navbar secundário para telas menores --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('empresa.index') }}" class="nav-link">Minha Empresa</a></li>
                    <li class="nav-item"><a href="{{ route('diagnostico.index') }}" class="nav-link">Diagnóstico de TI</a></li>
                    <li class="nav-item"><a href="{{ route('canvas.index') }}" class="nav-link">Business Model Canvas</a></li>
                    <li class="nav-item"><a href="{{ route('projetos.index') }}" class="nav-link">Projetos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Conteúdo principal --}}
    <main class="container py-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    {{-- Rodapé --}}
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>&copy; {{ date('Y') }} - Sistema de Gestão PETI</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
