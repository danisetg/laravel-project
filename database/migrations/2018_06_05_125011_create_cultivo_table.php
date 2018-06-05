<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCultivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->date('fecha_siembra');
            $table->float('area');
            $table->integer("campo_id")->unsigned();
            $table->integer("variedad_id")->unsigned();
            $table->integer("fenologia_id")->unsigned();
            $table->integer("coordenada_id")->unsigned();
        });
        Schema::table('cultivo', function (Blueprint $table) {
            $table->foreign('campo_id')->references('id')->on('campo')->onDelete('cascade');
            $table->foreign('variedad_id')->references('id')->on('variedad')->onDelete('cascade');
            $table->foreign('fenologia_id')->references('id')->on('fenologia')->onDelete('cascade');
            $table->foreign('coordenada_id')->references('id')->on('coordenada')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('cultivo');
    }
}
