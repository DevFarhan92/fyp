<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactoryGoodsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factory_goods_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('good_id');
            $table->double('previous_quantity');
            $table->double('new_quantity');
            $table->string('quantity_status');
            $table->date('date_updated');
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
        Schema::dropIfExists('factory_goods_histories');
    }
}
