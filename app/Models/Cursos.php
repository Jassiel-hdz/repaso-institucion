<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'periodo'];

    public function alumnos()
    {
        return $this->belongsToMany(Alumnos::class, 'alumno_curso', 'curso_id', 'alumno_id');
    }
}