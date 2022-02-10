<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_histories', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('dealer_id');
            $table->date('date'); 
            $table->date('clearing_date');
            $table->string('cheque_number');
            $table->double('cheque_amount');
            $table->string('cheque_attachment');
            $table->string('cheque_type');
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
        Schema::dropIfExists('cheque_histories');
    }
}
