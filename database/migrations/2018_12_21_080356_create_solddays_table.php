<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolddaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solddays', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->nullable();
            $table->integer('productid')->nullable();
            $table->integer('warehouseid')->nullable();
            $table->integer('quantity')->nullable(); 
            $table->string('Country')->nullable();
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
        Schema::dropIfExists('solddays');
    }
}
