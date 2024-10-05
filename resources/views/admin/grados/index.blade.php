@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-4">
        <form action="{{route('grados.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="grado">Grado</label>
                <input type="text" class="form-control" name="nombre" id="grado" placeholder="Ingrese un Grado">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grado as $grado)
                <tr>
                    <td>{{$grado->nombre}}</td>
                    <td>
                        <a href="{{route('grados.edit', $grado->id)}}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{route('grados.destroy', $grado->id)}}" method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection