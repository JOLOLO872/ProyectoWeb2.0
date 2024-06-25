<!-- resources/views/permisos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Permiso</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('permisos.update', $permiso->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="
