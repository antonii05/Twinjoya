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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('nombre_fiscal');
            $table->string('direccion')->nullable();
            $table->unsignedInteger('cod_postal')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('cif')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('web')->nullable();
            $table->boolean('activo');
            $table->integer('id_empresa');
            $table->integer('id_usuario');
            $table->timestamp('fecha_alta')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
