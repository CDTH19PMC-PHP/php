<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdlInChiTietBangDiem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chi_tiet_bang_diem', function (Blueprint $table) {
            $table->unsignedInteger('ma_bang_diem')->after('id');
            $table->foreign('ma_bang_diem')
                  ->references('id')->on('bang_diem')
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
