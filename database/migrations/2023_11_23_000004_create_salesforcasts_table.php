<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salesforcasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->float('jan_price');
            $table->float('feb_price');
            $table->float('mar_price');
            $table->float('apr_price');
            $table->float('may_price');
            $table->float('jun_price');
            $table->float('jul_price')->nullable();
            $table->float('aug_price')->nullable();
            $table->float('sep_price')->nullable();
            $table->float('oct_price')->nullable();
            $table->float('nov_price')->nullable();
            $table->float('dec_price')->nullable();
            $table->unsignedBigInteger('jan_qty');
            $table->unsignedBigInteger('feb_qty');
            $table->unsignedBigInteger('mar_qty');
            $table->unsignedBigInteger('apr_qty');
            $table->unsignedBigInteger('may_qty');
            $table->unsignedBigInteger('jun_qty');
            $table->unsignedBigInteger('jul_qty')->nullable();
            $table->unsignedBigInteger('aug_qty')->nullable();
            $table->unsignedBigInteger('sep_qty')->nullable();
            $table->unsignedBigInteger('oct_qty')->nullable();
            $table->unsignedBigInteger('nov_qty')->nullable();
            $table->unsignedBigInteger('dec_qty')->nullable();
            $table->float('jan_cost');
            $table->float('feb_cost');
            $table->float('mar_cost');
            $table->float('apr_cost');
            $table->float('may_cost');
            $table->float('jun_cost');
            $table->float('jul_cost')->nullable();
            $table->float('aug_cost')->nullable();
            $table->float('sep_cost')->nullable();
            $table->float('oct_cost')->nullable();
            $table->float('nov_cost')->nullable();
            $table->float('dec_cost')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesforcasts');
    }
};
