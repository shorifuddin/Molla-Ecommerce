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
        Schema::create('prodcategories', function (Blueprint $table) {
            $table->bigIncrements('pro_cate_id');
            $table->string('pro_cate_name',100)->unique()->nullable();
            $table->integer('pro_cate_parent')->nullable();
            $table->string('pro_cate_icon',50)->nullable();
            $table->string('pro_cate_image',50)->nullable();
            $table->string('pro_cate_slug',50)->nullable();
            $table->integer('pro_cate_creator')->nullable();
            $table->integer('pro_cate_editor')->nullable();
            $table->integer('pro_cate_status')->default(1);
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
        Schema::dropIfExists('prodcategories');
    }
};
