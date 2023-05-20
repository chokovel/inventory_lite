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
        Schema::table('product_returns', function (Blueprint $table) {
            //
            $table->foreignId('sale_cart_id')->nullable()->constrained('sale_carts');
            $table->dropConstrainedForeignId('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_returns', function (Blueprint $table) {
            //
            $table->foreignId('product_color_id')->constrained('product_colors');
        });
    }
};
