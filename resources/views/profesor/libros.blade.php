@extends('layouts.profesor')


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="row mt-5">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">NUEVO LIBRO </h4>

                <form action="{{route('profesor.store_libro')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="text" name="curso_id" value="{{$curso_id}}" hidden>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="file" class="form-control" id="url" name="url" required>
                    </div>





                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">LIBROS DE CURSO</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                        <tr>
                            <td>{{$libro->nombre}}</td>
                            <td>



                                <!-- <img src="{{Storage::url('libros/' . $libro->url)}}" class="img-fluid" alt=""> -->

                                <a href="{{config('app.url')}}/storage/libros/{{ $libro->url }}" class="btn btn-sm btn-success" download="{{$libro->url}}">Descargar</a>

                                <form action="{{route('profesor.libro_destroy', $libro)}}" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Esta Seguro de Eliminar?')">Eliminar</button>
                                </form>



                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

@endsection