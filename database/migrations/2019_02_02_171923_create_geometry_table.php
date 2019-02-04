<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeometryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geometry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('_id');
            $table->string('name');
            $table->string('icon');
            $table->integer('id_address')->unsigned();

            $table->foreign('id_address')
                ->references('id')->on('address')
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
        Schema::dropIfExists('geometry');
    }
}
