<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('client');
            $table->string('payments'); //JSON
            $table->string('products'); //JSON
            $table->string('calculation'); //JSON
            $table->string('initial_fee'); //JSON
            $table->string('paid_payment'); //JSON
            $table->string('remaining_payment'); //JSON
            $table->string('closed')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
