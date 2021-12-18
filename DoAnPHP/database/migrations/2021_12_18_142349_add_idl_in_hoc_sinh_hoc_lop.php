<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdlInHocSinhHocLop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoc_sinh_hoc_lop', function (Blueprint $table) {
            $table->unsignedInteger('ma_lop')->after('id');
            $table->foreign('ma_lop')
                  ->references('id')->on('lop')
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
        Schema::table('hoc_sinh_hoc_lop', function (Blueprint $table) {
            //
        });
    }
}
