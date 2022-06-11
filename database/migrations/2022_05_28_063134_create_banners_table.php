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
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_title',200)->nullable();
            $table->text('ban_subtitle')->nullable();
            $table->string('ban_btn',30)->nullable();
            $table->string('ban_btnurl',200)->nullable();
            $table->string('ban_img',50)->nullable();
            $table->string('ban_slug',60)->nullable();
            $table->integer('ban_creator')->nullable();
            $table->integer('ban_editor')->nullable();
            $table->integer('ban_status')->default(1);
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
        Schema::dropIfExists('banners');
    }
};
