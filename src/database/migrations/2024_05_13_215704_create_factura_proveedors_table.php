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
            $table->id();
            //----------------------------GLOBAL----------------------------
            $table->integer('id_empresa');
            $table->integer('numero_recepcion')->unique();
            $table->timestamp('fecha_recepcion');
            $table->integer('id_proveedor');
            //----------------------------GLOBAL-----------------------------
            
            //----------------------------cabecera----------------------------
            $table->integer('numero_factura')->unique();
            $table->dateTime('fecha_factura');
            # Preguntar por tipo de compra
            //----------------------------cabecera----------------------------
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
