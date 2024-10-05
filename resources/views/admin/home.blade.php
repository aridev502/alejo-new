@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">
<script src="{{asset('plugins/fontaweson/fontaws.js')}}"></script>
@endsection



@section('content')
<div class="container">
    <div class="row">
        <!-- Card for Users -->
        <div class="col-md-3 p-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">Administra todos los usuarios en el sistema.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuarios</a>
                </div>
            </div>
        </div>

        <!-- Card for Roles -->
        <div class="col-md-3 p-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <p class="card-text">Administrar roles de usuarios y permisos.</p>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">Ver Roles</a>
                </div>
            </div>
        </div>

        <!-- Card for Permissions -->
        <div class="col-md-3 p-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Permisos</h5>
                    <p class="card-text">Administrar permisos para roles y usuarios.</p>
                    <a href="{{ route('permissions.index') }}" class="btn btn-primary">Ver Permisos</a>
                </div>
            </div>
        </div>

        <!-- Card for Grados -->
        <div class="col-md-3 p-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Grados</h5>
                    <p class="card-text">Ver y administrar todos los grados en el sistema.</p>
                    <a href="{{ route('grados.index') }}" class="btn btn-primary">Ver Grados</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Estudiantes</h5>
                    <p class="card-text">Ver y administrar todos los estudiantes en el sistema.</p>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-primary">Ver Estudiantes</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Profesores</h5>
                    <p class="card-text">Ver y administrar todos los profesores en el sistema.</p>
                    <a href="{{ route('profesors.index') }}" class="btn btn-primary">Ver Profesores</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <p class="card-text">Ver y administrar todos los cursos en el sistema.</p>
                    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Ver Cursos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>


@endsection