<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel de Controle PETI')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Estilos exclusivos das páginas públicas --}}
    <style>
        body {
            background: #f5f8ff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .public-header {
            background: #212529;
            padding: 25px 0;
            text-align: center;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .public-container {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
        }

        footer {
            background: transparent;
            text-align: center;
            padding: 15px 0;
            color: #777;
            font-size: 0.9rem;
        }
    </style>

    @yield('styles')
</head>

<body>

    <header class="public-header">
        Painel de Controle PETI
    </header>

    <div class="public-container">
        @yield('content')
    </div>

    <footer>
        <small>&copy; {{ date('Y') }} Sistema PETI — Todos os direitos reservados.</small>
    </footer>

</body>
</html>