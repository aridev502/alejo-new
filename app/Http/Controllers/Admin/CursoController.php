<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Profesor;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Mostrar la lista de cursos
    public function index()
    {
        $cursos = Curso::with('grado', 'profesor')->get(); // Cargar las relaciones de grado y profesor
        $grados = Grado::all();  // Obtener todos los grados
        $profesores = Profesor::all(); // Obtener todos los profesores
        return view('admin.cursos.index', compact('cursos', 'grados', 'profesores'));
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        $grados = Grado::all();  // Obtener todos los grados
        $profesores = Profesor::all(); // Obtener todos los profesores
        return view('admin.cursos.create', compact('grados', 'profesores'));
    }

    // Guardar un nuevo curso en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grado_id' => 'required|exists:grados,id', // Verificar que el grado existe
            'profesor_id' => 'required|exists:profesors,id', // Verificar que el profesor existe
        ]);

        // Crear el nuevo curso
        Curso::create([
            'nombre' => $request->nombre,
            'grado_id' => $request->grado_id,
            'profesor_id' => $request->profesor_id,
        ]);

        // Redireccionar a la lista de cursos con un mensaje de éxito
        return redirect()->route('cursos.index')->with('success', 'Curso creado exitosamente.');
    }

    // Mostrar un curso específico
    public function show($id)
    {
        $curso = Curso::with('grado', 'profesor')->findOrFail($id);
        return view('admin.cursos.show', compact('curso'));
    }

    // Mostrar el formulario para editar un curso existente
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $grados = Grado::all();  // Obtener todos los grados
        $profesores = Profesor::all(); // Obtener todos los profesores
        return view('admin.cursos.edit', compact('curso', 'grados', 'profesores'));
    }

    // Actualizar un curso en la base de datos
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grado_id' => 'required|exists:grados,id',
            'profesor_id' => 'required|exists:profesors,id',
        ]);

        // Encontrar el curso a actualizar
        $curso = Curso::findOrFail($id);

        // Actualizar los datos del curso
        $curso->nombre = $request->nombre;
        $curso->grado_id = $request->grado_id;
        $curso->profesor_id = $request->profesor_id;
        $curso->save();

        // Redireccionar con un mensaje de éxito
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }

    // Eliminar un curso de la base de datos
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
