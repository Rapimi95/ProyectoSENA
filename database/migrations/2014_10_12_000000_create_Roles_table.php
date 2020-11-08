<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2020_11_08_010749_create_proyectos_tables.php
class CreateProyectosTables extends Migration
=======
class CreateRolesTable extends Migration
>>>>>>> db9d63e316ab648123bc643f54f8560fa8c2efc5:database/migrations/2014_10_12_000000_create_Roles_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2020_11_08_010749_create_proyectos_tables.php
        Schema::create('proyectos_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('categoria');
            $table->string('descripcion');
            $table->uuid('id_resultado');
=======
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
>>>>>>> db9d63e316ab648123bc643f54f8560fa8c2efc5:database/migrations/2014_10_12_000000_create_Roles_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos_tables');
    }
}
