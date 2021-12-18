<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdhsInBaiTapSinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bai_tap_sinh_vien', function (Blueprint $table) {
            $table->unsignedInteger('ma_hoc_sinh')->after('id');
            $table->foreign('ma_hoc_sinh')
                  ->references('id')->on('hoc_sinh')
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
