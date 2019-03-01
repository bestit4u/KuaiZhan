<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
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
            $table->text('linklogo')->nullable();
            $table->text('fussnoteinvoice')->nullable(); 
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
        Schema::dropIfExists('companies');
    }
}
