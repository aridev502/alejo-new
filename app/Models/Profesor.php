<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesor extends Model
{
    use HasFactory;

    public $guarded = [];


    /**
     * Get all of the curso for the Profesor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function curso(): HasMany
    {
        return $this->hasMany(Curso::class);
    }
}
