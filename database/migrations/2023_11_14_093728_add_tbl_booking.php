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
    Schema::table('tbl_booking', function (Blueprint $table) {
        
        $table->integer('booking_user_id');
        $table->integer('booking_price');
        $table->integer('booking_pay');
        $table->string('booking_code');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_booking', function (Blueprint $table) {
            //
        });
    }
};
