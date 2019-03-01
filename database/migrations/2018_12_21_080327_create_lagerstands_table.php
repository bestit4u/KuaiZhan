<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLagerstandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lagerstands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productid')->nullable();
            $table->integer('warehouseid')->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('lagerstands');
    }
}
