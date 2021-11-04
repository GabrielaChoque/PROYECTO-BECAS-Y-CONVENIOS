<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionPracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_practicas', function (Blueprint $table) {
            $table->increments('id_asignacion');
            $table->integer('id_practicante')->unsigned();
            $table->integer('id_empresa')->unsigned();
            $table->timestamps();
            $table->foreign('id_practicante')->references('id_practicante')->on('practicantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_practicas');
    }
}
