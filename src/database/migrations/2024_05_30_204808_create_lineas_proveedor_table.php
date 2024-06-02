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
        Schema::create('lineas_proveedor', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_factura');
            $table->string('nombre_articulo');
            $table->string('ref_proveedor');
            $table->text('descripcion');
            $table->integer('unidades');
            $table->decimal('peso');
            $table->decimal('precio_unitario');
            $table->decimal('total_linea');
            $table->decimal('margen');
            $table->decimal('precio_coste');
            $table->integer('id_empresa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_proveedor');
    }
};
