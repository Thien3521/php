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
        Schema::create('tbl_statistical', function (Blueprint $table) {
            $table->id("statistical_id");
            $table->integer('admin_information_id');
            $table->date('order_date');
            $table->integer('revenue');
            $table->integer('quantity');
            $table->integer('total_order');
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
       
    }
};
