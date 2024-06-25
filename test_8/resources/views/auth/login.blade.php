<!-- resources/views/auth/login.blade.php -->

@extends('layouts.pruebalogin')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-lg-4">
        <div class="login-container">
            <div class="logo-container">
                <img src="{{ asset('images/rincon.png') }}" alt="Logo">
            </div>
            <h4 class="title">Sistema de Gestión de Contenidos (CMS)</h4>
            <h4 class="title">DOW301 - Diseño y Programación Orientada a la WEB</h4>

            <!-- Formulario de Laravel -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Recordarme</label>
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" href="{{asset("/home")}}"  class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
            <!-- Fin del Formulario de Laravel -->
        </div>
    </div>
</div>
@endsection
