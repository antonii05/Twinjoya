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
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->timestamp('fecha_recogida');
            $table->integer('id_cliente')->nullable();
            $table->integer('id_proveedor')->nullable();
            //no tengo claro si no deberia de ser nullable
            $table->integer('id_taller')->nullable(); 
            $table->string('telefono')->nullable();
            $table->timestamp('fecha_prevista')->nullable();
            $table->integer('unidades')->nullable();
            $table->decimal('importe')->nullable();
            $table->text('descripcion');
            $table->text('reparacion_a_realizar');
            $table->string('numero_serie')->nullable();
            $table->decimal('presupuesto_taller')->nullable();
            $table->integer('id_usuario');
            $table->boolean('terminada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparaciones');
    }
};
