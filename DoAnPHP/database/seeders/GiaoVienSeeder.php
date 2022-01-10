<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\Models\GiaoVien;

class GiaoVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gv = new GiaoVien();
        $gv->username = 'giaovien@gmail.com';
        $gv->password = Hash::make('12345');
        $gv->ho_ten='nguyengiavien';
        $gv->ngay_sinh="16/7/2001";
        $gv->dia_chi='Duong B';
        $gv->so_dien_thoai='0123';
        $gv->trang_thai=1;
        $gv->save();

        DB::table('giao_vien')->insert([
            ['ngay_sinh'=>'16-07-2001','username'=>'giaovienthien1@gmail.com',
                'ho_ten'=>'Đoàn Văn Thiện','password'=>Hash::make('12345'),
                'dia_chi'=>'Đăk Nông - Việt Nam','so_dien_thoai'=>'0964980948','trang_thai'=>1],
            ['ngay_sinh'=>'16-07-2001','username'=>'giaovienthien2@gmail.com',
                'ho_ten'=>'Trần Quang Thiện','password'=>Hash::make('12345'),
                'dia_chi'=>'Long An - Việt Nam','so_dien_thoai'=>'09001009','trang_thai'=>1],
            ['ngay_sinh'=>'16-07-2001','username'=>'giaovienthien3@gmail.com',
                'ho_ten'=>'Trần Thanh Toàn','password'=>Hash::make('12345'),
                'dia_chi'=>'Đồng Tháp - Việt Nam','so_dien_thoai'=>'190010654','trang_thai'=>1]

        ]);
    }
}
