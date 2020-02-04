<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * @property GerenciarNoticias
         */
        Schema::create('manage_notice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('editor_id')->unsigned();
            $table->bigInteger('adm_id')->unsigned();
            $table->bigInteger('notice_id')->unsigned();
            $table->foreign('editor_id')->references('id')->on('editors')->onUpdate('cascade');
            $table->foreign('adm_id')->references('id')->on('administrators')->onUpdate('cascade');
            $table->foreign('notice_id')->references('id')->on('notices')->onUpdate('cascade');
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
        Schema::dropIfExists('gerencia_noticia');
        Schema::dropIfExists('manage_notice');
    }
}
