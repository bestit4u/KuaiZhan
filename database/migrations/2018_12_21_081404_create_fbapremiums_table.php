<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbapremiumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fbapremiums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seller')->nullable();
            $table->integer('fbapremiucountryid')->nullable();
            $table->integer('productid')->nullable();
            $table->integer('availablepcs')->nullable();
            $table->timestamp('lastdateupdate')->nullable();
            $table->integer('ideallevel')->nullable();
            $table->string('asinfba')->nullable();
            $table->integer('eanfba')->nullable();
            $table->string('skufba')->nullable();
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
        Schema::dropIfExists('fbapremiums');
    }
}
