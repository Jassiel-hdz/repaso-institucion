<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Carreras;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlumnoController extends Controller
{
    // Mostrar la lista de alumnos (Punto 5)
    public function index()
    {
        $alumnos = Alumnos::with('carrera')->get(); // Traemos alumnos con su carrera
        return Inertia::render('Alumnos/Index', [
            'alumnos' => $alumnos
        ]);
    }

    // Mostrar el formulario de creación
    public function create()
    {
        $carreras = Carreras::all(); // Necesitamos las carreras para el select
        return Inertia::render('Alumnos/Create', [
            'carreras' => $carreras
        ]);
    }

    // Guardar el alumno (Punto 8: Lógica de negocio)
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo' => 'required|email|unique:alumnos,correo',
            'telefono' => 'required',
            'direccion' => 'required',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        Alumnos::create($request->all());

        return redirect()->route('alumnos.index');
    }
}