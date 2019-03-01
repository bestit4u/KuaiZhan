<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewcontainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newcontainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelcode')->nullable();
            $table->integer('manufacturerid')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamp('deliveryexpected')->nullable(); 
            $table->timestamp('deliveryyear')->nullable(); 
            $table->timestamp('deliveryweek')->nullable(); 
            $table->timestamp('deliveredok')->nullable(); 
            $table->boolean('registeredtolagerstandok')->default(false);
            $table->text('notes')->nullable(); 
            $table->integer('userid')->nullable(); 
            $table->timestamp('dateupdate')->nullable();
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
        Schema::dropIfExists('newcontainers');
    }
}
