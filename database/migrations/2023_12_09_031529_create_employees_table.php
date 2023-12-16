<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('businessinfo_id');

            $table->unsignedInteger('ceo')->nullable();
            $table->unsignedInteger('pro_manager')->nullable();
            $table->unsignedInteger('workers')->nullable();
            $table->unsignedInteger('marketers')->nullable();
            $table->unsignedInteger('other_employees')->nullable();
            $table->timestamps();
           $table->foreign('businessinfo_id')->references('id')->on('businessinfos')
                ->onDelete('CASCADE'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
