<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Alumno; 
use App\Models\Course; 

class EnrollmentsController extends Controller
{
    public function index()
    {
        
        $enrollments = [
            ['id' => 1, 'estudiante' => 'Jassiel Hernandez', 'curso' => 'Programación I', 'fecha' => '2026-03-10', 'estado' => 'Completado'],
            ['id' => 2, 'estudiante' => 'María García', 'curso' => 'Bases de Datos', 'fecha' => '2026-03-11', 'estado' => 'Pendiente'],
            ['id' => 3, 'estudiante' => 'Carlos López', 'curso' => 'Desarrollo Web', 'fecha' => '2026-03-12', 'estado' => 'Completado'],
            ['id' => 4, 'estudiante' => 'Ana Martínez', 'curso' => 'Ingeniería Ambiental', 'fecha' => '2026-03-13', 'estado' => 'Completado'],
            ['id' => 5, 'estudiante' => 'Luis Rodríguez', 'curso' => 'Redes I', 'fecha' => '2026-03-14', 'estado' => 'Cancelado'],
            ['id' => 6, 'estudiante' => 'Alex Funez', 'curso' => 'Seguridad Informática', 'fecha' => '2026-03-15', 'estado' => 'Completado'],
            ['id' => 7, 'estudiante' => 'Laura Berganza', 'curso' => 'Diseño Gráfico', 'fecha' => '2026-03-16', 'estado' => 'Pendiente'],
            ['id' => 8, 'estudiante' => 'Rosa Meza', 'curso' => 'Estadística', 'fecha' => '2026-03-17', 'estado' => 'Completado'],
            ['id' => 9, 'estudiante' => 'Nain Caceres', 'curso' => 'Cálculo', 'fecha' => '2026-03-18', 'estado' => 'Completado'],
            ['id' => 10, 'estudiante' => 'Jose Moncada', 'curso' => 'Sistemas Operativos', 'fecha' => '2026-03-19', 'estado' => 'Completado'],
        ];

        return Inertia::render('Enrollments/Index', [
            'enrollments' => $enrollments 
        ]);
    }

    public function create()
    {
        return Inertia::render('Enrollments/Create', [
            'students' => Alumno::all(),
            'courses' => Course::all()
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->route('enrollments.index');
    }
}