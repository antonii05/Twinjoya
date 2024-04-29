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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique()->nullable();
            $table->text('descripcion')->nullable();
            $table->string('matricula')->nullable();
            $table->decimal('medida')->nullable();    //se metera el numero y las secciones controlaran la unidad de medida
            $table->integer('id_familia');      //donde se desplegara un select con las secciones registradas y activas
            $table->integer('id_proveedor'); //donde se desplegara un select con los proveedores registrados y activos
            $table->string('tipo_compra')->nullable();     //mas adelante ver que es
            $table->string('barcode')->nullable();
            //? $table->integer('id_marcas')->nulblela();
            $table->decimal('precio_venta');
            $table->boolean('compras_unidad_medida'); //por defecto estara activado como unidad == 0
            $table->boolean('ventas_unidad_medida'); //por defecto estara activado como unidad == 0
            $table->boolean('articulo_obsoleto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
