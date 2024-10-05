<?php

use App\Models\Curso;
use App\Models\Libro;
use App\Models\SalidaArticulo;
use App\Models\SalidaMaterial;



function cursosProfesor($profesor_id)
{
    return Curso::where('profesor_id', $profesor_id)->get();
}

function getLibrosToCuros($curso_id)
{

    return Libro::where('curso_id', $curso_id)->get();
}
