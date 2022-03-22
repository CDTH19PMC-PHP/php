<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noi_dung');
            $table->date('thoi_gian');
            $table->integer('ma_hoc_sinh');
            $table->integer('ma_bai_tap');
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
        Schema::dropIfExists('binh_luan');
    }
}
