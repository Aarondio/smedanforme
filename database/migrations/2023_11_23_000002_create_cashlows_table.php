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
        Schema::create('cashlows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('directin_one');
            $table->unsignedBigInteger('directin_two');
            $table->unsignedBigInteger('directin_three');
            $table->unsignedBigInteger('directin_four');
            $table->unsignedBigInteger('indirectin_one');
            $table->unsignedBigInteger('indirectin_two');
            $table->unsignedBigInteger('indirectin_three');
            $table->unsignedBigInteger('indirectin_four');
            $table->unsignedBigInteger('wages_one');
            $table->unsignedBigInteger('wages_two');
            $table->unsignedBigInteger('wages_three');
            $table->unsignedBigInteger('wages_four');
            $table->unsignedBigInteger('capitalcost_one');
            $table->unsignedBigInteger('capitalcost_two');
            $table->unsignedBigInteger('capitalcost_three');
            $table->unsignedBigInteger('capitalcost_four');
            $table->unsignedBigInteger('businessinfo_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashlows');
    }
};
