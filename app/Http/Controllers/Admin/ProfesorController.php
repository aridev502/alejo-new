<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Libro;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    // Mostrar la lista de profesores
    public function index()
    {
        $profesores = Profesor::all(); // Puedes paginar si tienes muchos datos, usando paginate()
        return view('admin.profesors.index', compact('profesores'));
    }

    // Mostrar el formulario para crear un nuevo profesor
    public function create()
    {
        return view('admin.profesors.create');
    }

    // Guardar un nuevo profesor en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:profesors,email',
            'password' => 'required|string|min:8',
            'edad' => 'required|numeric|min:18',
        ]);

        // Crear nuevo profesor
        Profesor::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => $request->password, // Encriptar la contraseña
            'edad' => $request->edad,
        ]);

        // Redireccionar a la lista de profesores con un mensaje de éxito
        return redirect()->route('profesors.index')->with('success', 'Profesor creado exitosamente.');
    }

    // Mostrar un profesor específico
    public function show($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('admin.profesors.show', compact('profesor'));
    }

    // Mostrar el formulario para editar un profesor existente
    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('admin.profesors.edit', compact('profesor'));
    }

    // Actualizar un profesor en la base de datos
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:profesors,email,' . $id,
            'edad' => 'required|numeric|min:18',
        ]);

        // Encontrar el profesor a editar
        $profesor = Profesor::findOrFail($id);

        // Actualizar los datos del profesor
        $profesor->nombre = $request->nombre;
        $profesor->apellidos = $request->apellidos;
        $profesor->email = $request->email;
        $profesor->password = $request->password; // Solo actualizar si se proporciona una nueva contraseña

        $profesor->edad = $request->edad;
        $profesor->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('profesors.index')->with('success', 'Profesor actualizado exitosamente.');
    }

    // Eliminar un profesor de la base de datos
    public function destroy($id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->delete();

        return redirect()->route('profesors.index')->with('success', 'Profesor eliminado exitosamente.');
    }


    // =============================================
    // =============================================
    // ==== AUTH PROFESOR=======
    // =============================================
    // =============================================


    function login_profesor()
    {
        return view('auth.profesor_login');
    }


    function login_profesor_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        Profesor::where('email', $request->email)->firstOrFail();
        $profesor = Profesor::where('email', $request->email)->firstOrFail();
        if ($request->password == $profesor->password) {


            $grados = Grado::all();

            session(['profesor_id' => $profesor->id]);
            session(['profe' => $profesor]);
            session(['grados' => $grados]);


            return redirect()->route('profesor.home');
        } else {
            return redirect(route('profesor.login'))->with('error', 'Contraseña incorrecta.');
        }
    }

    function home()
    {
        $grados = Grado::all();
        return view('profesor.home', compact('grados'));
    }


    function curso($curso_id)
    {
        $libros = Libro::where('curso_id', $curso_id)->get();

        $curso_id = Curso::where('id', $curso_id)->first();

        $grado = Grado::where('id', $curso_id->grado_id)->first();


        $estudiantes = Estudiante::where('grado_id', $grado->id)->get();

        return view('profesor.libros', compact('libros', 'curso_id', 'estudiantes'));
    }

    function store_libro(Request $request)
    {


        $request->validate([
            'nombre' => 'required|string|max:255',
            'url' => 'required|file|mimes:pdf,docx,jpg,png.mp4,jpeg,gif|max:2048',
        ]);




        $file = $request->file('url');
        $nombre_archivo =  $file->getClientOriginalName();
        $file->storeAs('public/libros/', $nombre_archivo);



        $libro = new Libro();
        $libro->nombre = $request->nombre;
        $libro->url = $nombre_archivo;
        $libro->curso_id = $request->curso_id;
        $libro->save();


        return back()->with('success', 'Libro creado exitosamente.');
    }


    function libro_destroy(Libro $libro)
    {


        $libro->delete();
        return back()->with('success', 'Libro eliminado exitosamente.');
    }
}
