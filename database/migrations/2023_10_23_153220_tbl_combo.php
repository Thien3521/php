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
        Schema::create('tbl_combo', function (Blueprint $table) {
            $table->id("combo_id");
            $table->integer('category_id');
            $table->integer('admin_id');
            $table->string('combo_name');
            $table->text('combo_introduce');
            $table->text('combo_information');
            $table->integer('combo_price');
            $table->integer('combo_time');
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
        Schema::dropIfExists('tbl_combo');
    }
};
