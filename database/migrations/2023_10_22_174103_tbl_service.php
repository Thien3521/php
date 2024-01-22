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
        Schema::create('tbl_service', function (Blueprint $table) {
            $table->id("service_id");
            $table->integer('category_id');
            $table->integer('admin_id');
            $table->string('service_name');
            $table->string('service_image')->nullable();
            $table->text('service_information');
            $table->integer('service_price');
            $table->text('service_describe');
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
        Schema::dropIfExists('tbl_service');
    }
};
