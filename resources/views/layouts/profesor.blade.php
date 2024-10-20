<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>

    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sobre Nosotros">
    <meta name="author" content="DeCoDev Desarrollo de Software">
    <!-- Favicon icon -->

    <link rel="icon" href="{{asset('logos/ico.ico')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
    <script src="{{asset('plugins/fontaweson/fontaws.js')}}" crossorigin="anonymous"></script>

    <link href="{{ asset('styles.css') }}" rel="stylesheet">

    <style>
        input,
        textarea,
        select {
            border-radius: 25px !important;
            border: 2px solid #716aca !important;
        }

        body {
            background: #fff !important;
        }
    </style>

    @yield('styles')
</head>

<body>


    <div class="">



        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#">{{config('app.name')}}</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('profesor.home')}}">INICIO</a>
                    </li>


                    @foreach (cursosProfesor(session('profesor_id')) as $p)

                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{route('profesor.curso', $p->id)}}">{{$p->nombre}} <br>
                            {{$p->grado->nombre}}

                        </a>
                    </li>
                    @endforeach



                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
                            NUEVO ESTUDIANTE
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">NUEVO ESTUDIANTE</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('pestudiantes.store')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="grado_id">GRADO</label>
                                                <select class="form-control" name="grado_id" id="grado">
                                                    <option value="">Seleccione un Grado</option>
                                                    @foreach (session('grados') as $grado)
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

                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{session('profe')['nombre']}}</a>


                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <!-- <a class="dropdown-item" href="#">Action 1</a> -->
                            <a class="dropdown-item" href="https://escuelatipofederacionjm.com/public/">Cerrar Sesion</a>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="container-fluid">
            @include('partial.admin.alert')





            @yield('content')

            @include('partial.admin.footer')
        </div>




        <script src="{{asset('plugins/bootstrap/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>



        @yield('scripts')
</body>

</html>