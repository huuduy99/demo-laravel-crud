<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSouthwestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('southwest', function (Blueprint $table) {
            $table->increments('id');
            $table->float('lat');
            $table->float('lng');
            $table->integer('id_viewport')->unsigned();
            $table->foreign('id_viewport')
                ->references('id')->on('viewport')
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
        Schema::dropIfExists('southwest');
    }
}
