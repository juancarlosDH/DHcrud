<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 180);
            $table->decimal('price', 10, 2)->default(0);
            $table->string('description')->nullable();
            $table->string('image')->nullable()->default('products/default.jpg');
            $table->integer('stock')->default(0);
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 180);
            $table->timestamps();
        });

        \DB::table('categories')->insert([
          [ 'name'=>'Electronica'],
          [ 'name'=>'Juguetes'],
          [ 'name'=>'Indumentaria'],
          [ 'name'=>'Calzado'],
        ]);

        Schema::create('category_product', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('product_id');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
    }





}
