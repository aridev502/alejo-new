
<?php

use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\UserController;
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
    return redirect('login');
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

    Route::get('/casa', 'HomeController@index')->name('home');



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
});
