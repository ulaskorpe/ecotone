<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('idorder');
            $table->integer('idproduct');
            $table->integer('amount')->default(0);
            $table->string('productcode')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('remarks')->nullable()->default(null);
            $table->float('price')->default(0);
            $table->integer('idvatgroup')->default(0);
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
        Schema::dropIfExists('order_products');
    }
}
