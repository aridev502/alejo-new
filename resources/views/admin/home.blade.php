@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">
<script src="{{asset('plugins/fontaweson/fontaws.js')}}"></script>
@endsection



@section('content')
<div class="container">
    <div class="row">
        <!-- Card for Users -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">Manage all users in the system.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
                </div>
            </div>
        </div>

        <!-- Card for Roles -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <p class="card-text">Manage user roles and permissions.</p>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">View Roles</a>
                </div>
            </div>
        </div>

        <!-- Card for Permissions -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Permissions</h5>
                    <p class="card-text">Manage permissions for roles and users.</p>
                    <a href="{{ route('permissions.index') }}" class="btn btn-primary">View Permissions</a>
                </div>
            </div>
        </div>

        <!-- Card for Grados -->
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Grados</h5>
                    <p class="card-text">View and manage all grados in the system.</p>
                    <a href="{{ route('grados.index') }}" class="btn btn-primary">View Grados</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Estudiantes</h5>
                    <p class="card-text">View and manage all grados in the system.</p>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-primary">View Grados</a>
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