<!-- resources/views/menu_items/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Elemento de Menú</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('menu-items.update', $menuItem->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="menu_id">Menú</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ $menu->id == $menuItem->menu_id ? 'selected' : '' }}>{{ $menu->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="
