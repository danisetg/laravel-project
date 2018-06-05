<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('abreviatura', 50);
            $table->integer('numero')->unique();
            $table->integer("unidad_id")->unsigned();
            $table->integer("municipio_id")->unsigned();
        });
        Schema::table('campo', function (Blueprint $table) {
            $table->foreign('unidad_id')->references('id')->on('unidad')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('campo');
    }
}
