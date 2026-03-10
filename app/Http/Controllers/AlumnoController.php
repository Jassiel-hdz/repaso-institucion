<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Carreras;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlumnoController extends Controller
{
   
    public function index()
    {
        $alumnos = Alumnos::with('carrera')->get(); 
        return Inertia::render('Alumnos/Index', [
            'alumnos' => $alumnos
        ]);
    }

   
    public function create()
    {
        $carreras = Carreras::all(); 
        return Inertia::render('Alumnos/Create', [
            'carreras' => $carreras
        ]);
    }

    
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