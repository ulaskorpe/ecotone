<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('idsupplier');
            $table->string('name')->nullable()->default(null);
            $table->string('contactname')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('address2')->nullable()->default(null);
            $table->string('zipcode')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('region')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('telephone')->nullable()->default(null);
            $table->string('emailaddress')->nullable()->default(null);
            $table->text('remarks')->nullable()->default(null);
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
        Schema::dropIfExists('suppliers');
    }
}
