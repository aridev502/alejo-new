@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $estudiante->nombre }}" required>
                    </div>

                    <!-- Apellidos -->
                    <div class="form-group mb-3">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $estudiante->apellidos }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $estudiante->email }}" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password">Contraseña (Opcional)</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Dejar en blanco si no deseas cambiarla">
                    </div>

                    <!-- Edad -->
                    <div class="form-group mb-3">
                        <label for="edad">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad" value="{{ $estudiante->edad }}" required>
                    </div>

                    <!-- Padre -->
                    <div class="form-group mb-3">
                        <label for="padre">Padre o Tutor</label>
                        <input type="text" class="form-control" id="padre" name="padre" value="{{ $estudiante->padre }}">
                    </div>

                    <!-- Teléfono -->
                    <div class="form-group mb-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $estudiante->telefono }}">
                    </div>

                    <!-- Botones de acción -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection