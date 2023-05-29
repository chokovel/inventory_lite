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
        Schema::create('transaction_ids', function (Blueprint $table) {
            //
            $table->id();
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
        Schema::table('sale_carts', function (Blueprint $table) {
            //
            $table->foreignId('transaction_id')->nullable()->constrained('transaction_ids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_cart', function (Blueprint $table) {
            //
        });
    }
};
