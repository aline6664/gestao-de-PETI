@extends('layouts.inicial')
@section('title', 'Login')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-sm p-4 login-card">
        <h3 class="text-center mb-3 fw-bold">Acesso ao Sistema</h3>
        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required placeholder="seu@email.com">
            </div>
            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" required placeholder="••••••">
            </div>

            <button type="submit" class="btn btn-blue w-100 mt-2">Entrar</button>
        </form>
    </div>
</div>

@endsection