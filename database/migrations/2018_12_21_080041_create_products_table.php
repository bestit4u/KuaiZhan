<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort')->nullable();
            $table->boolean('active')->default(false);
            $table->integer('modelcode')->nullable();
            $table->string('nameshort')->nullable();
            $table->string('namelong')->nullable(); 
            $table->string('category')->nullable();
            $table->string('subcat')->nullable();
            $table->string('virtualkit')->nullable(); 
            $table->string('linkitem')->nullable();
            $table->string('asin')->nullable();
            $table->integer('ean')->nullable(); 
            $table->string('sku')->nullable();
            $table->string('asin2')->nullable();
            $table->string('ean2')->nullable(); 
            $table->string('sku2')->nullable();
            $table->string('asin3')->nullable();
            $table->string('ean3')->nullable(); 
            $table->string('sku3')->nullable();
            $table->decimal('price',5,2)->nullable();
            $table->timestamp('dateprice')->nullable(); 
            $table->string('itemsinpaket1')->nullable();
            $table->string('itemsinpaket2')->nullable();
            $table->string('itemsinpaket3')->nullable(); 
            $table->integer('manufacturerid')->nullable();
            $table->integer('codemanu')->nullable();
            $table->string('content')->nullable(); 
            $table->timestamp('ordertime')->nullable();
            $table->timestamp('orderrangetime')->nullable();
            $table->integer('buffer')->nullable(); 
            $table->integer('target')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('lenghtcm',5,2)->nullable(); 
            $table->decimal('widthcm',5,2)->nullable();
            $table->decimal('heightcm',5,2)->nullable();
            $table->decimal('weightkg',5,2)->nullable(); 
            $table->decimal('lenghtcmbox',5,2)->nullable();
            $table->decimal('widthcmbox',5,2)->nullable();
            $table->decimal('heightcmbox',5,2)->nullable(); 
            $table->decimal('weightkgbox',5,2)->nullable();
            $table->decimal('mq1000box',5,2)->nullable();
            $table->string('pcs1')->nullable(); 
            $table->integer('productid1')->nullable();
            $table->string('pcs2')->nullable();
            $table->integer('productid2')->nullable(); 
            $table->string('pcs3')->nullable();
            $table->integer('productid3')->nullable();
            $table->string('pcs4')->nullable(); 
            $table->integer('productid4')->nullable();
            $table->string('pcs5')->nullable();
            $table->integer('productid5')->nullable(); 
            $table->string('pcs6')->nullable();
            $table->integer('productid6')->nullable();
            $table->string('pcs7')->nullable(); 
            $table->integer('productid7')->nullable();
            $table->string('pcs8')->nullable();
            $table->integer('productid8')->nullable(); 
            $table->string('pcs9')->nullable();
            $table->integer('productid9')->nullable();
            $table->text('description')->nullable(); 
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
        Schema::dropIfExists('products');
    }
}
