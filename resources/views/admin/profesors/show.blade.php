@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detalles del Profesor</h1>

    <div class="row">
        <!-- Card para mostrar los detalles del profesor -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h4 class="card-title">Información Personal</h4>
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $profesor->nombre }}</p>
                    <p><strong>Apellidos:</strong> {{ $profesor->apellidos }}</p>
                    <p><strong>Email:</strong> {{ $profesor->email }}</p>
                    <p><strong>Edad:</strong> {{ $profesor->edad }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card mb-3">
                <div class="card-header">
                    <h4 class="card-title">Cursos en los que imparte</h4>
                </div>
                <div class="card-body">
                    <ul>
                        @forelse ($profesor->curso as $curso)
                        <li class="text-uppercase">{{ $curso->nombre }} (Grado: {{ $curso->grado->nombre }})</li>
                        @empty
                        <li>No imparte en ningun curso</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="d-flex justify-content-between">
        <!-- Botón para regresar a la lista de profesores -->
        <a href="{{ route('profesors.index') }}" class="btn btn-secondary">Volver a la Lista</a>

        <!-- Botón para editar el profesor -->
        <a href="{{ route('profesors.edit', $profesor->id) }}" class="btn btn-primary">Editar Profesor</a>

        <!-- Botón para eliminar el profesor -->
        <form action="{{ route('profesors.destroy', $profesor->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este profesor?')">Eliminar Profesor</button>
        </form>
    </div>
</div>
@endsection