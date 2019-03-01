<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropshippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropshippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seller')->nullable();
            $table->integer('dropcountryid')->nullable();
            $table->integer('productid')->nullable();
            $table->integer('availablepcs')->nullable();
            $table->timestamp('lastdateupdate')->nullable();
            $table->integer('ideallevel')->nullable();
            $table->string('asindrop')->nullable();
            $table->integer('eandrop')->nullable();
            $table->string('skudrop')->nullable();
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
        Schema::dropIfExists('dropshippings');
    }
}
