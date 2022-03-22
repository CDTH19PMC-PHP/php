<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongBao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thong_bao', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ma_lop');
            $table->string('ten_tb');
            $table->string('noi_dungtb');
            $table->dateTime('thoi_gian');
            $table->integer('trang_thai')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('thong_bao');
    }
}
