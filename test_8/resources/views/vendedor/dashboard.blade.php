@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard de Vendedor</h1>
    <p>Bienvenido, {{ Auth::user()->name }}</p>
</div>
@endsection