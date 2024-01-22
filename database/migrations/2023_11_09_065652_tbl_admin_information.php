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
        Schema::create('tbl_admin_information', function (Blueprint $table) {
            $table->id("admin_information_id");
            $table->integer('admin_id');
            $table->string('admin_information_name');
            $table->string('admin_image')->nullable();
            $table->string('admin_address');
            $table->integer('admin_phone');
            $table->string('admin_introduce');
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
        Schema::dropIfExists('tbl_admin_information');
    }
};
