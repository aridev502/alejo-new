@extends('layouts.admin')



@section('content')
<div class="row">
    <div class="col">
        <div class="card">

            <div class="card-body">
                <h1>{{ $estudiante->nombre }} {{ $estudiante->apellidos }}</h1>
                <p>Email: {{ $estudiante->email }}</p>
                <p>Edad: {{ $estudiante->edad }}</p>
                <p>Padre: {{ $estudiante->padre }}</p>
                <p>Teléfono: {{ $estudiante->telefono }}</p>

                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class='btn btn-danger' onclick="return confirm('Esta Seguro de Eliminar?')"><i class='fa fa-trash' aria-hidden='true'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection