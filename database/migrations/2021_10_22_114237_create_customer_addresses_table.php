<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('customerid');
            $table->string('name');
            $table->string('contactname')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('address2')->nullable()->default(null);
            $table->string('zipcode')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('region')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->boolean('defaultinvoice')->default(0);
            $table->boolean('defaultdelivery')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('customer_addresses');
    }
}
