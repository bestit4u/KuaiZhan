<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('companyid')->nullable();
            $table->string('shortname')->nullable();
            $table->string('location')->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable(); 
            $table->integer('plz')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable(); 
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable(); 
            $table->string('email')->nullable();
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
        Schema::dropIfExists('warehouses');
    }
}
