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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedInteger('cod_postal')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();
            $table->string('telefono')->nullable();   //es posible que se puedan cambiar a string en un futuro
            $table->string('telefonoFijo')->nullable();
            $table->string('nif')->unique()->nullable();
            $table->string('grupo_familiar')->nullable();
            $table->boolean('activo');  //mas tarde es posible un cambio
            $table->integer('tipo_cliente')->nullable();
            $table->timestamp('fecha_alta')->nullable();
            $table->integer('id_usuario');
            $table->integer('id_empresa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
