
<?php

use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfesorController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Grado;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $grados = Grado::all();
    return view('welcome', compact('grados'));
});

Auth::routes();

// rauta para ejecutar comando artisan desde la web
Route::get('artisan/{comando}/{contra}', function ($comando, $contra) {
    if ($contra === 'Taylor110eAA.') {
        // ejemplo www.decodev.net/cmd/migrate
        Artisan::call($comando);
        dd(Artisan::output());
    } else {
        echo 'NO ACCESO';
    }
});


Route::group(['prefix' => "admin", 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'AdminPanelAccess']], function () {

    Route::get('/', 'HomeController@index')->name('home');



    // rutas para usuarios
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController');


    Route::prefix('user')->group(function () {
        Route::get('report', [UserController::class, 'report'])->name('user.report');
        Route::post('allventa', [UserController::class, 'getVentasToUserAndDate'])->name('user.getVentasToUserAndDate');
    });


    Route::get('/grados', [GradoController::class, 'index'])->name('grados.index'); // Mostrar todos los grados
    Route::get('/grados/create', [GradoController::class, 'create'])->name('grados.create'); // Mostrar formulario de creación
    Route::post('/grados', [GradoController::class, 'store'])->name('grados.store'); // Guardar un nuevo grado
    Route::get('/grados/{grado}', [GradoController::class, 'show'])->name('grados.show'); // Mostrar un grado específico
    Route::get('/grados/{grado}/edit', [GradoController::class, 'edit'])->name('grados.edit'); // Mostrar formulario de edición
    Route::put('/grados/{grado}', [GradoController::class, 'update'])->name('grados.update'); // Actualizar un grado específico
    Route::delete('/grados/{grado}', [GradoController::class, 'destroy'])->name('grados.destroy'); // Eliminar un grado específico





    Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
    Route::get('estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
    Route::post('estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');
    Route::get('estudiantes/{estudiante}', [EstudianteController::class, 'show'])->name('estudiantes.show');
    Route::get('estudiantes/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::put('estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::delete('estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');


    // Listar todos los profesores (index)
    Route::get('profesors', [ProfesorController::class, 'index'])->name('profesors.index');
    // Mostrar el formulario de creación de un nuevo profesor (create)
    Route::get('profesors/create', [ProfesorController::class, 'create'])->name('profesors.create');
    // Guardar el nuevo profesor en la base de datos (store)
    Route::post('profesors', [ProfesorController::class, 'store'])->name('profesors.store');
    // Mostrar un profesor específico (show)
    Route::get('profesors/{profesor}', [ProfesorController::class, 'show'])->name('profesors.show');
    // Mostrar el formulario de edición para un profesor específico (edit)
    Route::get('profesors/{profesor}/edit', [ProfesorController::class, 'edit'])->name('profesors.edit');
    // Actualizar un profesor en la base de datos (update)
    Route::put('profesors/{profesor}', [ProfesorController::class, 'update'])->name('profesors.update');
    // Eliminar un profesor de la base de datos (destroy)
    Route::delete('profesors/{profesor}', [ProfesorController::class, 'destroy'])->name('profesors.destroy');





    // Listar todos los cursos (index)
    Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
    // Mostrar el formulario de creación de un nuevo curso (create)
    Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    // Guardar el nuevo curso en la base de datos (store)
    Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
    // Mostrar un curso específico (show)
    Route::get('cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');
    // Mostrar el formulario de edición para un curso específico (edit)
    Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    // Actualizar un curso en la base de datos (update)
    Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
    // Eliminar un curso de la base de datos (destroy)
    Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
});




Route::get('long-profesro', [ProfesorController::class, 'login_profesor'])->name('profesor.login');
Route::post('long-profesro', [ProfesorController::class, 'login_profesor_post'])->name('profesor.login_profesor_post');
Route::post('store_libro', [ProfesorController::class, 'store_libro'])->name('profesor.store_libro');
Route::delete('libro_destroy/{libro}', [ProfesorController::class, 'libro_destroy'])->name('profesor.libro_destroy');
Route::get('profe-home', [ProfesorController::class, 'home'])->name('profesor.home');
Route::get('profe-currso/{curso_id}', [ProfesorController::class, 'curso'])->name('profesor.curso');



Route::get('curos/{curso_id}', [HomeController::class, 'getCusrsoTolibros'])->name('home.getCusrsoTolibros');
