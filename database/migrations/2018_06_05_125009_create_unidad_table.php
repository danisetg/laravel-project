<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('abreviatura', 50);
            $table->integer('tipo')->unsigned();
            $table->integer("ueb_id")->unsigned();
        });
        Schema::table('unidad', function (Blueprint $table) {
            $table->foreign('ueb_id')->references('id')->on('ueb')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('unidad');
    }
}
