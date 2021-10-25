<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id('idlocation');
            $table->integer('idwarehouse');
            $table->integer('idlocation_type')->default(0);
            $table->integer('parent_idlocation')->default(0);
            $table->string('name')->nullable()->default(null);
            $table->boolean('unlink_on_empty')->default(0);
            $table->boolean('is_bulk_location')->default(0);
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
        Schema::dropIfExists('locations');
    }
}
