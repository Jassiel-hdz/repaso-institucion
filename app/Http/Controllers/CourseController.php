<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function index()
    {
    
        $courses = [
            ['id' => 1, 'codigo' => 'PROG101', 'nombre' => 'Programación I', 'descripcion' => 'Introducción a la lógica', 'creditos' => 4, 'docente' => 'Ing. Ledin Alvarado', 'periodo' => 'I-2026', 'capacidad' => 30, 'estado' => 'Activo'],
            ['id' => 2, 'codigo' => 'BD202', 'nombre' => 'Bases de Datos', 'descripcion' => 'Diseño relacional', 'creditos' => 4, 'docente' => 'Ing. Sikaffy', 'periodo' => 'I-2026', 'capacidad' => 25, 'estado' => 'Activo'],
            ['id' => 3, 'codigo' => 'WEB303', 'nombre' => 'Desarrollo Web', 'descripcion' => 'HTML, CSS y JS', 'creditos' => 3, 'docente' => 'Ing. Mario', 'periodo' => 'I-2026', 'capacidad' => 20, 'estado' => 'Activo'],
            ['id' => 4, 'codigo' => 'IAS404', 'nombre' => 'Ingenieria Ambiental', 'descripcion' => 'Plantas', 'creditos' => 2, 'docente' => 'Ing. Jonathan', 'periodo' => 'I-2026', 'capacidad' => 15, 'estado' => 'Activo'],
            ['id' => 5, 'codigo' => 'RED505', 'nombre' => 'Redes I', 'descripcion' => 'Protocolos TCP/IP', 'creditos' => 4, 'docente' => 'Ing. Ledin Alvarado', 'periodo' => 'I-2026', 'capacidad' => 25, 'estado' => 'Inactivo'],
            ['id' => 6, 'codigo' => 'SEG606', 'nombre' => 'Seguridad Informática', 'descripcion' => 'Cifrado de datos', 'creditos' => 3, 'docente' => 'Ing. Sikaffy', 'periodo' => 'I-2026', 'capacidad' => 20, 'estado' => 'Activo'],
            ['id' => 7, 'codigo' => 'DIS707', 'nombre' => 'Diseño Gráfico', 'descripcion' => 'Adobe Photoshop', 'creditos' => 2, 'docente' => 'Lic. Yeimy', 'periodo' => 'I-2026', 'capacidad' => 30, 'estado' => 'Activo'],
            ['id' => 8, 'codigo' => 'EST808', 'nombre' => 'Estadística', 'descripcion' => 'Probabilidades', 'creditos' => 4, 'docente' => 'Lic. Zenia', 'periodo' => 'I-2026', 'capacidad' => 40, 'estado' => 'Activo'],
            ['id' => 9, 'codigo' => 'CL909', 'nombre' => 'Calculo', 'descripcion' => 'Derivadas e Integrales', 'creditos' => 3, 'docente' => 'Ing. Mario Escobar', 'periodo' => 'I-2026', 'capacidad' => 15, 'estado' => 'Activo'],
            ['id' => 10, 'codigo' => 'SIS1010', 'nombre' => 'Sistemas Operativos', 'descripcion' => 'Linux y Windows', 'creditos' => 4, 'docente' => 'Ing. Mario Escobar', 'periodo' => 'I-2026', 'capacidad' => 20, 'estado' => 'Activo'],
        ];

        return Inertia::render('Courses/Index', ['courses' => $courses]);
    }

    public function create()
    {
        return Inertia::render('Courses/Create');
    }

    public function store(Request $request)
    {
        return redirect()->route('courses.index')->with('message', 'Curso guardado con éxito');
    }
}