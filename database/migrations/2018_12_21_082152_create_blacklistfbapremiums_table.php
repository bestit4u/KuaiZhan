<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlacklistfbapremiumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklistfbapremiums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productid')->nullable();
            $table->timestamp('date')->nullable();
            $table->text('notes')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('blacklistfbapremiums');
    }
}
