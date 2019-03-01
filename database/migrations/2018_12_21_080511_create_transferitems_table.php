<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productid')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('from')->nullable(); 
            $table->boolean('outsideconfirm')->default(false); 
            $table->string('to')->nullable(); 
            $table->boolean('insideconfirm')->default(false);
            $table->text('notes')->nullable(); 
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
        Schema::dropIfExists('transferitems');
    }
}
