<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->date('date');
            $table->integer('dealer_id');
            $table->string('tank_number');
            $table->string('no_of_blocks');
            $table->string('per_unit_price');
            $table->string('total_price');
            $table->string('payment_recieved');
            $table->string('payment_pending');
            $table->string('truck_number');
            $table->string('driver_name');
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
        Schema::dropIfExists('sales');
    }
}
