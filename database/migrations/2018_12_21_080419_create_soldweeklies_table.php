<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldweekliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldweeklies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weeksell')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('productid')->nullable();
            $table->integer('warehouseid')->nullable(); 
            $table->string('country')->nullable();
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
        Schema::dropIfExists('soldweeklies');
    }
}
