@extends('layouts.admin')



@section('content')


<div class="row">
    <div class="col">

        <div class="card">

            <div class="card-body">


                <h2 class="text-centrer">Cursos</h2>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                    NUEVO CURSO
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">NUEVO CURSO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">


                                <form action="{{ route('cursos.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre del Curso</label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                                        @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="grado_id" class="form-label">Grado</label>
                                        <select class="form-control @error('grado_id') is-invalid @enderror" id="grado_id" name="grado_id" required>
                                            <option value="">Seleccione un grado</option>
                                            @foreach ($grados as $grado)
                                            <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('grado_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="profesor_id" class="form-label">Profesor</label>
                                        <select class="form-control @error('profesor_id') is-invalid @enderror" id="profesor_id" name="profesor_id" required>
                                            <option value="">Seleccione un profesor</option>
                                            @foreach ($profesores as $profesor)
                                            <option value="{{ $profesor->id }}">{{ $profesor->nombre }} {{ $profesor->apellidos }}</option>
                                            @endforeach
                                        </select>
                                        @error('profesor_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Crear Curso</button>
                                    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                                </form>



                            </div>

                        </div>
                    </div>
                </div>

                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Profesor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
                        <tr>
                            <td scope="row">{{$curso->nombre}}</td>
                            <td>{{$curso->grado->nombre}}</td>
                            <td>{{$curso->profesor->nombre}}</td>
                            <td>

                                <form action="{{route('cursos.destroy', $curso->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class='btn btn-danger' onclick="return confirm('Esta Seguro de Eliminar?')"><i class='fa fa-trash' aria-hidden='true'></i></button>
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


@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('table').DataTable({
            "language": {
                'info': '_TOTAL_ REGISTROS',
                'search': 'BUSCAR',
                'paginate': {
                    'next': 'SIGUIENTE',
                    'previous': 'ATRAS'
                },
                'loadingRecords': 'CARGANDO',
                'emptyTable': 'NO EXISTEN DATOS',
                'zeroRecords': 'NO EXISTEN DATOS IGUALES'
            }
        });
    });
</script>
@endsection