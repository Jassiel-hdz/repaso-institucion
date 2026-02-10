<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    use HasFactory;

    // Permitimos el llenado masivo del nombre de la carrera
    protected $fillable = ['nombre'];

    /**
     * Relación 1:N - Una carrera tiene muchos alumnos.
     */
    public function alumnos()
    {
        return $this->hasMany(Alumnos::class, 'carrera_id');
    }
}