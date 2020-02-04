<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * @property Administrador
         */
        Schema::create('administrators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permission');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('adm_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('adm_id')->references('id')->on('administrators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrator');
        Schema::dropIfExists('administrators');
    }
}
