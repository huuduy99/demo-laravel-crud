<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtmlAttributionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('html_attribution', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link', 100);
            $table->integer('id_photo')->unsigned();
            $table->foreign('id_photo')
                ->references('id')->on('photo')
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
        Schema::dropIfExists('html_attribution');
    }
}
