<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMssvIdInMarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bang_diem', function (Blueprint $table) {
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
        Schema::table('bang_diem', function (Blueprint $table) {
            //
        });
    }
}
