<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            // Datos personales solicitados por el cliente
            $table->string('nombre_completo');
            $table->string('correo')->unique(); // Unique para que no se repitan correos
            $table->string('telefono');
            $table->text('direccion');

            
            $table->foreignId('carrera_id')
                  ->constrained('carreras') 
                  ->onDelete('cascade'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};