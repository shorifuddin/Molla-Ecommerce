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
        Schema::create('cupons', function (Blueprint $table) {
            $table->bigIncrements('coupon_id');
            $table->string('coupon_name');
            $table->string('coupon_code');
            $table->string('coupon_amount');
            $table->date('coupon_starting');
            $table->date('coupon_ending');
            $table->string('coupon_remarks')->nullable();
            $table->integer('coupon_creator');
            $table->integer('coupon_editor')->nullable();
            $table->string('coupon_slug')->unique();
            $table->integer('coupon_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupons');
    }
};
