<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderid')->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('kindproblemid')->nullable();
            $table->text('description')->nullable();
            $table->boolean('ifcourier')->default(false);
            $table->boolean('ifmanufacturer')->default(false);
            $table->decimal('refundedsum',7,2)->nullable();
            $table->decimal('returncost',7,2)->nullable();
            $table->string('carriername')->nullable();
            $table->string('tracking')->nullable();
            $table->string('customerpayreturn')->nullable();
            $table->boolean('closed')->default(false);
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
        Schema::dropIfExists('problems');
    }
}
