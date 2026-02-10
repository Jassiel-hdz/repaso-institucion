<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    
    protected $fillable = ['nombre_completo', 'correo', 'telefono', 'direccion', 'carrera_id'];

    public function carrera()
    {
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }

    public function perfil()
    {
        return $this->hasOne(PerfilEstudiante::class, 'alumno_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Cursos::class, 'alumno_curso', 'alumno_id', 'curso_id');
    }
}