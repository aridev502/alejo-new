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