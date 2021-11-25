<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');

            /* UTILIZAMOS LAS CONSTATNES QUE DEFINIMOS EN EL MODELO DE CURSO */
            $table->enum('status', [Course::BORRADOR, Course::REVISION, Course::PUBLICADO])->default(Course::BORRADOR);

            $table->string('slug');

            /* LLAVES FORANEAS DE LAS TABLAS RELACIONADAS (ver el diagrama)*/
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();

            /* RESTRICCIONES DE LLAVE FORANEA */
            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade'); //Cuando el usuario se de de baja los cursos que creeo seran eliminados
            $table->foreign('level_id')->references('id')->on('levels')->OnDelete('set null'); //Si el nivel se elimina los cursos que tengan ese nivel solo quedaran sin nivel asignado no se eliminaran
            $table->foreign('category_id')->references('id')->on('categories')->OnDelete('set null');
            $table->foreign('price_id')->references('id')->on('prices')->OnDelete('set null');

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
        Schema::dropIfExists('courses');
    }
}
