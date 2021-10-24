<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('idproduct_stock_history');
            $table->integer('idproduct');
            $table->integer('idwarehouse')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('reserved')->default(0);
            $table->integer('reservedbackorders')->default(0);
            $table->integer('reservedpicklists')->default(0);
            $table->integer('reservedallocations')->default(0);
            $table->integer('freestock')->default(0);
         /*   $table->integer('iduser')->default(0);
            $table->integer('old_stock')->default(0);
            $table->integer('stock_change')->default(0);
            $table->integer('new_stock')->default(0);
            $table->string('reason')->nullable()->default(null);
            $table->string('change_type')->nullable()->default(null);*/
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
        Schema::dropIfExists('stocks');
    }
}
