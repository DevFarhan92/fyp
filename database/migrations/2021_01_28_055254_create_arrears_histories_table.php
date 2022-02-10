<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrearsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrears_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dealer_id');
            $table->double('previous_balance');
            $table->double('amount_paid');
            $table->double('new_balance');
            $table->string('paid_through');
            $table->date('paid_date');
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
        Schema::dropIfExists('arrears_histories');
    }
}
