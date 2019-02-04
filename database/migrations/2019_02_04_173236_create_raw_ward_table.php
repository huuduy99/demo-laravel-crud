<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawWardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_ward', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('lat');
            $table->string('lng');
            $table->integer('id_district')->unsigned();
            $table->foreign('id_district')->references('id')->on('raw_district')->onDelete('cascade');

            $table->integer('id_type_raw_child_district')->unsigned();
            $table->foreign('id_type_raw_child_district')->references('id')->on('raw_child_district_type')->onDelete('cascade');
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
        Schema::dropIfExists('raw_ward');
    }
}
