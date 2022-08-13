<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('car_model_id')->onDelete('cascade');
            $table->foreignId('customer_id')->onDelete('cascade');
            $table->foreignId('state_id')->onDelete('cascade');
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
        Schema::dropIfExists('car_deliveries');
    }
}
