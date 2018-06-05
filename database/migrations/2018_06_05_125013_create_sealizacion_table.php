<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSealizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senalizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->float('territorio');
            $table->date('created_at');
            $table->integer("plaga_cultivo_id")->unsigned();
        });
        Schema::table('senalizacion', function (Blueprint $table) {
            $table->foreign('plaga_cultivo_id')->references('id')->on('plaga_cultivo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senalizacion');
    }
}
