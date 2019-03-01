<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('platformid')->nullable();
            $table->integer('countryid')->nullable();
            $table->integer('channelid')->nullable();
            $table->decimal('extracost',5,2)->nullable();
            $table->decimal('price',5,2)->nullable();
            $table->decimal('pp',5,2)->nullable();
            $table->boolean('pricecheck')->default(false);
            $table->boolean('ppcheck')->default(false);
            $table->boolean('datecheck')->default(false);
            $table->boolean('discountactual')->default(false);
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
        Schema::dropIfExists('prices');
    }
}
