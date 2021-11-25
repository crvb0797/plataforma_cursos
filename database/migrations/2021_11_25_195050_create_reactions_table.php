<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Reaction;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();

            $table->enum('value', [Reaction::LIKE, Reaction::DISLIKE]);

            /* LLAVES FORANEA */
            $table->unsignedBigInteger('user_id');

            /* RESTRICCIONES DE LLAVE FORANEA */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            /* CAMPOS DE TABLA PLIMORFICA */
            $table->unsignedBigInteger('reactionable_id');
            $table->string('reactionable_type');

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
        Schema::dropIfExists('reactions');
    }
}
