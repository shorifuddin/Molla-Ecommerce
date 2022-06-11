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
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('brand_id');
            $table->string('brand_name',100)->unique()->nullable();
            $table->text('brand_remaks')->nullable();
            $table->string('brand_image',50)->nullable();
            $table->string('brand_slug',100)->nullable();
            $table->integer('brand_creator')->nullable();
            $table->integer('brand_editor')->nullable();
            $table->integer('brand_status')->default(1);
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
        Schema::dropIfExists('brands');
    }
};
