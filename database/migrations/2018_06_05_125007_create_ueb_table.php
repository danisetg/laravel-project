<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ueb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('abreviatura', 50);
            $table->integer("empresa_id")->unsigned();
        });
        Schema::table('ueb', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('ueb');
    }
}
