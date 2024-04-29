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
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->text('descripcion_familia')->nullable();
            $table->integer('id_seccion'); //sera el valor del desplegable
            $table->string('unidad_medida')->nullable();
            $table->string('texto_etiqueta')->nullable();
            //$table->string('mennu_web')->nullable();
            $table->unsignedInteger('contador')->nullable();
            $table->decimal('descuento')->nullable();
            // * faltan los 4 checks del separador (FOTO EN WHATSAPP)
            //$table->boolean('imprimir_ventas')->nullable();
            // $table->boolean('compras_unidad_medida'); //por defecto estara activado como unidad == 0
            // $table->boolean('compras_has_metal'); // marcar si compra con metal incluido == 0
            // $table->string('compras_subcuenta_asociada')->nullable();
            // $table->boolean('ventas_unidad_medida'); //por defecto estara activado como unidad == 0
            // $table->string('ventas_subcuenta_asociada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familias');
    }
};
