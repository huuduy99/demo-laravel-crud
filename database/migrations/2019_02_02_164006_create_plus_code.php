<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlusCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plus_code', function (Blueprint $table) {
            $table->increments('id');
            $table->string('compound_code');
            $table->string('global_code');
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
        Schema::dropIfExists('plus_code');
    }
}
