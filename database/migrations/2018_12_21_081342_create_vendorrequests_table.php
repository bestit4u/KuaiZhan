<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seller')->nullable();
            $table->integer('vendordepotid')->nullable();
            $table->integer('productid')->nullable();
            $table->string('asinvendor')->nullable();
            $table->integer('eanvendor')->nullable();
            $table->string('skuvendor')->nullable();
            $table->integer('userid')->nullable();
            $table->timestamp('dateupdate')->nullable();
            $table->boolean('registeredtolagerstandok')->default(false);
            $table->boolean('registeredtosolddayok')->default(false);
            $table->boolean('registeredtosoldweeklyok')->default(false);
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
        Schema::dropIfExists('vendorrequests');
    }
}
