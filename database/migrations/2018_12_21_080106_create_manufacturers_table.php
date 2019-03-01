<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shortname')->nullable();
            $table->string('longname')->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();
            $table->integer('plz')->nullable(); 
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable(); 
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable(); 
            $table->text('note')->nullable();
            $table->string('contact1')->nullable();
            $table->string('phone1')->nullable(); 
            $table->string('email1')->nullable();
            $table->string('note1')->nullable();
            $table->string('contact2')->nullable(); 
            $table->string('phone2')->nullable();
            $table->string('email2')->nullable();
            $table->string('note2')->nullable(); 
            $table->string('contact3')->nullable();
            $table->string('phone3')->nullable();
            $table->string('email3')->nullable(); 
            $table->string('note3')->nullable();
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
        Schema::dropIfExists('manufacturers');
    }
}
