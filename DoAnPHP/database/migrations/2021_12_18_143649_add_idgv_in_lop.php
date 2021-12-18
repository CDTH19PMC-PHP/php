<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdgvInLop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lop', function (Blueprint $table) {
            $table->unsignedInteger('ma_giao_vien')->after('id');
            $table->foreign('ma_giao_vien')
                  ->references('id')->on('giao_vien')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lop', function (Blueprint $table) {
            //
        });
    }
}
