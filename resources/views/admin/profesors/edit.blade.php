@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Profesor</h1>

    <form action="{{ route('profesors.update', $profesor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Nombre -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $profesor->nombre }}" required>
                    </div>
                </div>
            </div>

            <!-- Apellidos -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $profesor->apellidos }}" required>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $profesor->email }}" required>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <label for="password">Contraseña (Opcional)</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Dejar en blanco si no deseas cambiarla">
                    </div>
                </div>
            </div>

            <!-- Edad -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <label for="edad">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" value="{{ $profesor->edad }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('profesors.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar Profesor</button>
        </div>
    </form>
</div>
@endsection