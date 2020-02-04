<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices_general', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('notice_id')->unsigned();
            $table->foreign('notice_id')->references('id')->on('notices')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('noticia_geral');
        Schema::dropIfExists('notices_general');
    }
}
