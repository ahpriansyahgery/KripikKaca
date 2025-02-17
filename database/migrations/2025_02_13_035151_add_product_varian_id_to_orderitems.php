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
        Schema::table('orderitems', function (Blueprint $table) {
            $table->unsignedBigInteger('product_varian_id')->nullable()->after('product_id');
            $table->foreign('product_varian_id')->references('id')->on('product_varians')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderitems', function (Blueprint $table) {
            $table->dropForeign(['product_varian_id']);
            $table->dropColumn('product_varian_id');
        });
    }
};
