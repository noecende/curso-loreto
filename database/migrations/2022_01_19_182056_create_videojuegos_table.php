<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideojuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('consola', ['ps4', 'xboxOne', 'pc']);
            $table->date('fecha_lanzamiento');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('categoria_id')
                    ->references('id')
                    ->on('categorias')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            //Agregar llave foránea para la tabla users.
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('videojuegos');
    }
}
