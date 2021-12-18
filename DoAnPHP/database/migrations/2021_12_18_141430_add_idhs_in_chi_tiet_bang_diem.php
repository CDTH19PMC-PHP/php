<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdhsInChiTietBangDiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chi_tiet_bang_diem', function (Blueprint $table) {
            $table->unsignedInteger('ma_bai_tap')->after('ma_hoc_sinh');
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
        Schema::table('chi_tiet_bang_diem', function (Blueprint $table) {
            //
        });
    }
}
