<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('businessinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('business_name')->nullable();

            $table->string('business_type')->nullable();
            $table->string('is_registered')->nullable();
            $table->string('register_type')->nullable();
            $table->string('suin')->nullable();
            $table->integer('business_age')->nullable();
            $table->string('register_year')->nullable();
            $table->string('sector')->nullable();
            $table->string('emp_no')->nullable();
            $table->string('status')->nullable()->default('Pending');
            $table->mediumText('address')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->integer('plan_type')->nullable()->default(1);
            $table->longText('audience_need')->nullable();
            $table->longText('business_model')->nullable();
            $table->longText('target_market')->nullable();
            $table->longText('competition_ad')->nullable();
            $table->longText('management_team')->nullable();
            $table->unsignedBigInteger('loan_amount')->nullable();
            $table->longText('loan_reason')->nullable();


        


           


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businessinfos');
    }
};
