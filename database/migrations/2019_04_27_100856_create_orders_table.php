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
            $table->integer('client_id');
            $table->string('client_name');
            $table->text('payments'); //JSON
            $table->text('products'); //JSON
            $table->text('calculation'); //JSON
            $table->text('initial_fee'); //JSON
            $table->string('paid_payment'); //JSON
            $table->string('remaining_payment'); //JSON
            $table->string('order_date'); //JSON
            $table->boolean('closed')->default(false);
            $table->boolean('confirmed')->default(false);
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
