<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('itemname');
            $table->text('itemdescription');
            $table->text('category');
            $table->string('itemimage1')->unique();
            $table->string('itemimage2')->;
            $table->string('itemimage3')->;
            $table->integer('reserve_id')->unsigned();
            $table->integer('itemlevel');
            $table->integer('discount');
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
        Schema::dropIfExists('items');
    }
}
