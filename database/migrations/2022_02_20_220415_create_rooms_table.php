<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table
                ->increments('number')
                ->startingValue(100)
                ->min(4)
                ->max(4);
            $table->integer('capacity');
            $table->integer('price');
            $table->string('status')->default('free');
            $table->bigInteger('creator_id')->unsigned();
            $table
                ->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            $table->integer('floor_number')->unsigned();
            $table
                ->foreign('floor_number')
                ->references('number')
                ->on('floors')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('rooms');
    }
}
