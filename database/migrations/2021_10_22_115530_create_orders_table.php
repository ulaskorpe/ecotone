<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('idorder');
            $table->integer('idcustomer')->default(0);
            $table->integer('idtemplate')->default(0);
            $table->integer('idshippingprovider_profile')->default(0);
            $table->string('orderid')->nullable()->default(null);;
             $table->string('deliveryname')->nullable()->default(null);
             $table->string('deliverycontactname')->nullable()->default(null);
             $table->string('deliveryaddress')->nullable()->default(null);
             $table->string('deliveryaddress2')->nullable()->default(null);
             $table->string('deliveryzipcode')->nullable()->default(null);
             $table->string('deliverycity')->nullable()->default(null);
             $table->string('deliveryregion')->nullable()->default(null);
             $table->string('deliverycountry')->nullable()->default(null);
             $table->string('full_delivery_address')->nullable()->default(null);
             $table->string('invoicename')->nullable()->default(null);
             $table->string('invoicecontactname')->nullable()->default(null);
             $table->string('invoiceaddress')->nullable()->default(null);
             $table->string('invoiceaddress2')->nullable()->default(null);
             $table->string('invoicezipcode')->nullable()->default(null);
             $table->string('invoicecity')->nullable()->default(null);
             $table->string('invoiceregion')->nullable()->default(null);
             $table->string('invoicecountry')->nullable()->default(null);
             $table->string('full_invoice_address')->nullable()->default(null);
             $table->string('telephone')->nullable()->default(null);
             $table->string('emailaddress')->nullable()->default(null);
             $table->string('reference')->nullable()->default(null);
             $table->string('customer_remarks')->nullable()->default(null);
             $table->boolean('partialdelivery')->default(0);
             $table->float('discount')->default(0);
             $table->boolean('invoiced')->default(0);
            $table->string('status')->nullable()->default(null);
            $table->integer('idfulfilment_customer')->default(0);
            $table->date('preferred_delivery_date')->nullable()->default(null);
            $table->string('language')->nullable()->default(null);
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
        Schema::dropIfExists('orders');
    }
}
