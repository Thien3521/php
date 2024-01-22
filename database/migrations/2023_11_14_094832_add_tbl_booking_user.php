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
        Schema::create('tbl_booking_user', function (Blueprint $table) {
            $table->id("booking_user_id");
            $table->string('bk_user_name');
            $table->string('bk_user_email');
            $table->integer('bk_user_phone');
            $table->string('bk_user_note');
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
        Schema::dropIfExists('tbl_booking_user');
    }
};
