<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('id_informe');
            $table->string('titulo')->nullable();
            $table->date('fecha')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('id_practicante')->unsigned();
            $table->timestamps();
            $table->foreign('id_practicante')->references('id_practicante')->on('practicantes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes');
    }
}
