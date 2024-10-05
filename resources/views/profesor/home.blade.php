@extends('layouts.profesor')

@section('content')

<div class="row">
    <div class="col">
        <h1 class="text-center">CURSOS IMPARTIDOS</h1>
    </div>
</div>

<div class="row mt-5">
    @foreach (cursosProfesor(session('profesor_id')) as $p)

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-uppercase">{{$p->nombre}} - {{$p->grado->nombre}}</h4>
                <a name="" id="" class="btn btn-primary" href="{{route('profesor.curso', $p->id)}}" role="button"><i class="fa fa-book" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection