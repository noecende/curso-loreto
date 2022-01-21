<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table->string('telefono');
            $table->string('chip');
            $table->unsignedBigInteger('user_id');
            //Crear la llave foránea.
            $table->foreign('user_id')
                    ->references('id')  //Referencia a la columna id de la tabla users
                    ->on('users')
                    ->onUpdate('cascade')  //Cómo se comporta cuando el usuario se actualiza.
                    ->onDelete('cascade'); //qué pasa si el usuario es eliminado.
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
        Schema::dropIfExists('telefonos');
    }
}
