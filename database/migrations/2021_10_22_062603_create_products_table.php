<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('idproduct');
            $table->integer('idvatgroup')->default(0);
            $table->string('name')->nullable()->default(null);
            $table->float('price')->default(0);
            $table->float('fixedstockprice')->default(0);
            $table->integer('idsupplier')->default(0);
            $table->string('productcode')->nullable()->default(null);
            $table->string('productcode_supplier')->nullable()->default(null);
            $table->integer('deliverytime')->default(0);
            $table->string('description')->nullable()->default(null);
            $table->string('barcode')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->boolean('unlimitedstock')->default(0);
            $table->integer('weight')->default(0);
            $table->integer('length')->default(0);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('minimum_purchase_quantity')->default(0);
            $table->integer('purchase_in_quantities_of')->default(0);
            $table->string('hs_code')->nullable()->default(null);
            $table->string('country_of_origin')->nullable()->default(null);
            $table->boolean('active')->default(1);
            $table->integer('idfulfilment_customer')->default(0);
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
        Schema::dropIfExists('products');
    }
}
