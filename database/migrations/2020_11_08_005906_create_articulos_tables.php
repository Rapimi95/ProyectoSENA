<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_tables', function (Blueprint $table) {
            $table->id();
            $table->string('tema');
            $table->string('titulo');
            $table->text('url');
            $table->string('autor');
            $table->string('estado');
            $table->string('tipo');
            $table->text('contenido');
            $table->year('año');
            $table->string('pais');
            $table->text('resultado');
            $table->text('resumen');
            $table->string('clasificacion');
            $table->uuid('id_revista');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_tables');
    }
}
