<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbonoCliente;
use App\Models\Articulo;
use App\Models\ArticulosCatalogo;
use App\Models\Cliente;
use App\Models\DeudaCliente;
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
        $this->middleware('auth');
    }


    function index()
    {
        return  view('admin.home');
    }
}
