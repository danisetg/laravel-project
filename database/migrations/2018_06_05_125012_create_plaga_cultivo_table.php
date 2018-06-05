<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlagaCultivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plaga_cultivo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indice');
            $table->integer('cultivo_id')->unsigned();
            $table->integer('plaga_id')->unsigned();
        });
        Schema::table('plaga_cultivo', function (Blueprint $table) {
            $table->foreign('cultivo_id')->references('id')->on('cultivo')->onDelete('cascade');
            $table->foreign('plaga_id')->references('id')->on('plaga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('plaga_cultivo');
    }
}
