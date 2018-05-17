<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletedMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletedmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('title');
            $table->text('messageabout');
            $table->text('actualmessage');
            $table->string('1stimage')->unique();
            $table->string('2ndimage');
            $table->string('3rdimage');
            $table->integer('sendto_id')->unsigned();
            $table->integer('message_id')->unsigned();
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table');
    }
}
