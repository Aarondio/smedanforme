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
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->unsignedBigInteger('businessinfo_id');
            $table->double('year')->nullable();
            $table->string('expense_type')->nullable();
            $table->double('salary')->nullable();
            $table->double('securities')->nullable();
            $table->double('rent')->nullable();
            $table->double('website')->nullable();
            $table->double('utilities')->nullable();
            $table->double('depreciation')->nullable();
            $table->double('adminexpenses')->nullable();
            $table->double('marketing')->nullable();
            $table->double('supplies')->nullable();
            $table->double('licences')->nullable();
            $table->double('consultation')->nullable();
            $table->double('internet')->nullable();
            $table->double('legal')->nullable();
            $table->double('miscell')->nullable();
            $table->double('insurance')->nullable();
            $table->double('others')->nullable();

            $table->foreign('businessinfo_id')->references('id')->on('businessinfos')
                ->onDelete('CASCADE');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
