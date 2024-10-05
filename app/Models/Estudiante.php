<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;


    // Define los campos que se pueden llenar masivamente
    protected $fillable = [
        'grado_id',
        'nombre',
        'apellidos',
        'email',
        'password',
        'edad',
        'padre',
        'telefono',
    ];

    // Relación con el modelo Grado
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
}
