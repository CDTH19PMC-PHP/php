<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_sinh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('mat_khau');
            $table->string('ho_ten',50);      
            $table->date('ngay_sinh');
            $table->text('dia_chi');
            $table->string('so_dien_thoai',13);
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
        Schema::dropIfExists('hoc_sinh');
    }
}
