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
        Schema::create('perfil_estudiantes', function (Blueprint $table) {
            $table->id();
            
           
            $table->foreignId('alumnos_id')
                  ->unique() 
                  ->constrained('alumnos')
                  ->onDelete('cascade');

           
            $table->string('numero_cuenta');
            $table->string('metodo_ingreso'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_estudiantes');
    }
};