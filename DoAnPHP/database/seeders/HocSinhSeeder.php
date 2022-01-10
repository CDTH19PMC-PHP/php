<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class HocSinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoc_sinh')->insert([
            ['ngay_sinh'=>'2001-04-29','email'=>'thiendoan9c@gmail.com','ho_ten'=>'Đoàn Văn Thiện','mat_khau'=>'thiendoan2k1','dia_chi'=>'Đăk Nông - Việt Nam','so_dien_thoai'=>'0964980948'],
            ['ngay_sinh'=>'2001-04-29','email'=>'thiendoan2942001@gmail.com','ho_ten'=>'Trần Quang Thiện','mat_khau'=>'thiendoan2k1','dia_chi'=>'Long An - Việt Nam','so_dien_thoai'=>'09001009'],
            ['ngay_sinh'=>'2001-04-29','email'=>'s2svykun9x@gmail.com','ho_ten'=>'Trần Thanh Toàn','mat_khau'=>'toankkk','dia_chi'=>'Đồng Tháp - Việt Nam','so_dien_thoai'=>'190010654']

        ]);
    }
}
