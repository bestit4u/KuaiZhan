<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('companyid')->nullable();
            $table->string('referencechannel')->nullable();
            $table->integer('weeksell')->nullable();
            $table->timestamp('date')->nullable();
            $table->boolean('multiorder')->default(false);
            $table->integer('quantity')->nullable();
            $table->integer('productid')->nullable();
            $table->decimal('sum',7,2)->nullable();
            $table->string('currency')->nullable();
            $table->integer('paymentid')->nullable();
            $table->integer('channelid')->nullable();
            $table->integer('warehouseid')->nullable();
            $table->integer('referenceorder')->nullable();
            $table->string('customer')->nullable();
            $table->string('customerextra')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->integer('plz')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('telefon')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('carriername')->nullable();
            $table->string('tracking')->nullable();
            $table->string('groupshipping')->nullable();
            $table->boolean('printedshippingok')->default(false);
            $table->integer('invoicenr')->nullable();
            $table->decimal('vat',7,2)->nullable();
            $table->boolean('registeredtolagerstandok')->default(false);
            $table->boolean('registeredtosolddayok')->default(false); 
            $table->boolean('registeredtosoldweeklyok')->default(false); 
            $table->boolean('courierinformedok')->default(false); 
            $table->boolean('trackinguploadedok')->default(false); 
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
        Schema::dropIfExists('orderitems');
    }
}
