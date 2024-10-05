@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ESTUDIANTES</h4>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                    NUEVO ESTUDIANTE
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form action="{{route('estudiantes.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="grado_id">GRADO</label>
                                        <select class="form-control" name="grado_id" id="grado">
                                            <option value="">Seleccione un Grado</option>
                                            @foreach ($grados as $grado)
                                            <option value="{{$grado->id}}">{{$grado->nombre}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">NOMBRE</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese el nombre del estudiante">
                                    </div>
                                    <div class="form-group">
                                        <label for="apellidos">APELLIDOS</label>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Ingrese los apellidos del estudiante">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Ingrese el email del estudiante">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">PASSWORD</label>
                                        <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Ingrese la contraseña del estudiante">
                                    </div>
                                    <div class="form-group">
                                        <label for="edad">EDAD</label>
                                        <input type="number" class="form-control" name="edad" id="edad" aria-describedby="helpId" placeholder="Ingrese la edad del estudiante">
                                    </div>
                                    <div class="form-group">
                                        <label for="padre">PADRE</label>
                                        <input type="text" class="form-control" name="padre" id="padre" aria-describedby="helpId" placeholder="Ingrese el nombre del padre del estudiante">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">TELEFONO</label>
                                        <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Ingrese el telefono del estudiante">
                                    </div>

                                    <button type="submit" class="btn btn-primary">GUARDAR</button>


                                </form>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>






                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>Grado</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Edad</th>
                            <th>Padre</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->grado->nombre }}</td>
                            <td>{{ $estudiante->nombre }}</td>
                            <td>{{ $estudiante->apellidos }}</td>
                            <td>{{ $estudiante->email }}</td>
                            <td>******</td>
                            <td>{{ $estudiante->edad }}</td>
                            <td>{{ $estudiante->padre }}</td>
                            <td>{{ $estudiante->telefono }}</td>
                            <td>

                                <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="post">
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