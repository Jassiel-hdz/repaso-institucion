<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilEstudiante extends Model
{
    use HasFactory;

    // Campos específicos que solicitó el cliente
    protected $fillable = ['alumno_id', 'numero_cuenta', 'metodo_ingreso'];

    /**
     * Relación 1:1 (Inversa) - Este perfil pertenece a un alumno específico.
     */
    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'alumno_id');
    }
}