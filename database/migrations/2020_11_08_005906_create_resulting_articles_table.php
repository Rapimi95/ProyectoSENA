<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultingArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resulting_articles', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('title');
            $table->text('url');
            $table->string('author');
            $table->string('state');
            $table->string('type');
            $table->text('content');
            $table->integer('year');
            $table->string('country');
            $table->text('result');
            $table->text('summary');
            $table->string('classification');
            $table->integer('project_id')->nullable();
            $table->integer('magazine_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
