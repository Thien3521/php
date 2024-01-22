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
        Schema::create('tbl_booking_service', function (Blueprint $table) {
            $table->id("booking_service_id");
            $table->string('bk_name');
            $table->string('bk_image')->nullable();
            $table->string('bk_address');
            $table->integer('bk_price');
            $table->string('bk_information');
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
        Schema::dropIfExists('tbl_booking_service');
    }
};
