<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Dashboard de Administrador</h1>
    @auth
        <p>Bienvenido, {{ Auth::user()->name }}</p>
    @endauth
</div>
@endsection
