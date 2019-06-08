<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('category_id');
            $table->string('description');
            $table->string('details');
            $table->string('real_cost');
            $table->string('price');
            $table->string('image')->nullable();
            $table->integer('available')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('profit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('products');
    }
}
