<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbonoCliente;
use App\Models\Articulo;
use App\Models\ArticulosCatalogo;
use App\Models\Cliente;
use App\Models\Curso;
use App\Models\DeudaCliente;
use App\Models\Grado;
use App\Models\Libro;
use App\Models\Ventas;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    function index()
    {
        return  view('admin.home');
    }


    function getCusrsoTolibros($grado_id)
    {

        $cursos = Curso::where('grado_id', $grado_id)->get();
        $grado = Grado::find($grado_id);
        return view('admin.libros', compact('cursos', 'grado'));
    }
}
