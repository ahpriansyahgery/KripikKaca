<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartitems', function (Blueprint $table) {
            $table->id();
           
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('cart_id')->unsigned();
            

            $table->integer('jumlah_product')->unsigned()->nullable();
            $table->integer('sub_total')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartitems');
    }
};
