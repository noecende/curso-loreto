<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas_vacunas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('vacuna_id');
            $table->foreign('mascota_id')
                    ->references('id')
                    ->on('mascotas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('vacuna_id')
                    ->references('id')
                    ->on('vacunas')
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
        Schema::dropIfExists('mascotas_vacunas');
    }
}
