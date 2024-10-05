@extends('layouts.admin')


@section('content')


<div class="row">
    <div class="col-12">
        <form action="{{route('grados.update', ['grado' => $grado->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{{$grado->nombre}}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>

        </form>
    </div>
</div>

@endsection