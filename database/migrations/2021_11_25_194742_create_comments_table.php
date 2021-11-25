<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            /* LLAVES FORANEA */
            $table->unsignedBigInteger('user_id');

            /* RESTRICCIONES DE LLAVE FORANEA */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            /* CAMPOS DE TABLA PLIMORFICA */
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');

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
        Schema::dropIfExists('comments');
    }
}
