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
            $table->string("Num_Control")->unique();
            $table->string("Nombre");
            $table->string("Primer_ap");
            $table->string("Segundo_ap");
            $table->date("Fecha_nac");
            $table->tinyInteger("Semestre");
            $table->string("Carrera");

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
