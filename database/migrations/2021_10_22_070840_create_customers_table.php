<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('idcustomer');
            $table->integer('customerid')->default(0);
            $table->string('name')->nullable()->default(null);
            $table->string('contactname')->nullable()->default(null);
            $table->string('telephone')->nullable()->default(null);
            $table->string('emailaddress')->nullable()->default(null);
            $table->float('discount')->default(0);
            $table->string('vatnumber')->nullable()->default(null);
            $table->boolean('calculatevat')->default(1);
            $table->string('remarks')->nullable()->default(null);
            $table->string('default_order_remarks')->nullable()->default(null);
            $table->string('language')->nullable()->default(null);
            $table->boolean('auto_split')->default(0);
            $table->integer('idtemplate')->default(0);
            $table->integer('idfulfilment_customer')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
