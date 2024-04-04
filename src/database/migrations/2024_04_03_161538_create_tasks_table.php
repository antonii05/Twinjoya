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
        /* Ademas debere de meter para algun campo a la tara para q pueda ser compartido con varias personas a la vez a traves de correo */
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('datos_adjuntos')->nullable();
            $table->timestamp('fecha_limite')->nullable();
            $table->boolean('archivado')->nullable();
            $table->integer('id_categoria');
            $table->integer('id_grupo');
            $table->integer('id_usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
