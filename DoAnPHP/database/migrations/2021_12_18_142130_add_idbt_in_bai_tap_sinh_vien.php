<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdbtInBaiTapSinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bai_tap_sinh_vien', function (Blueprint $table) {
            $table->unsignedInteger('ma_bai_tap')->after('id');
            $table->foreign('ma_bai_tap')
                  ->references('id')->on('bai_tap')
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
        Schema::table('bai_tap_sinh_vien', function (Blueprint $table) {
            //
        });
    }
}
