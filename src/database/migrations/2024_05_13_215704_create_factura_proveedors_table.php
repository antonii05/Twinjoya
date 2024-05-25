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
        Schema::create('facturas_proveedores', function (Blueprint $table) {
            //$table->id();
            $table->id('numero_factura')->primary();
            $table->integer('id_empresa');
            $table->integer('numero_recepcion')->unique();
            $table->timestamp('fecha_recepcion');
            $table->integer('id_proveedor');            
            $table->dateTime('fecha_factura');
            # Preguntar por tipo de compra
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas_proveedores');
    }
};
