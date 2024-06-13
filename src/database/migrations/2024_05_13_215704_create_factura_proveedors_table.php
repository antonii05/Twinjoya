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
            $table->id('numero_factura')->primary();
            $table->date('fecha_recepcion');
            //$table->dateTime('fecha_factura');
            $table->integer('id_proveedor');            
            $table->integer('id_empresa');
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
