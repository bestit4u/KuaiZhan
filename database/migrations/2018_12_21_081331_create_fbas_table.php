<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fbas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seller')->nullable();
            $table->integer('fbadepotid')->nullable();
            $table->integer('productid')->nullable();
            $table->integer('actuallevel')->nullable();
            $table->timestamp('lastdateupdate')->nullable();
            $table->integer('ideallevel')->nullable();
            $table->string('asinfba')->nullable();
            $table->integer('eanfba')->nullable();
            $table->string('skufba')->nullable();
            $table->boolean('registeredtolagerstandok')->default(false);
            $table->boolean('registeredtosolddayok')->default(false);
            $table->boolean('registeredtosoldweeklyok')->default(false);
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
        Schema::dropIfExists('fbas');
    }
}
