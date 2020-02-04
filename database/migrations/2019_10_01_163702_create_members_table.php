<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Membros
         */
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course');
            $table->text('description');
            $table->string('photo')->nullable();
            $table->bigInteger('people_id')->unsigned();
            $table->foreign('people_id')->references('id')->on('peoples')->onUpdate('cascade')->onDelete('cascade');
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

        Schema::dropIfExists('members');
        Schema::dropIfExists('membro');
    }
}
