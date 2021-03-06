<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\Models\HocSinh;

class HocSinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hs = new HocSinh();
        $hs->username = 'hocsinh@gmail.com';
        $hs->password = Hash::make('12345');
        $hs->ho_ten='nguyenhocsinh';
        $hs->ngay_sinh="16/7/2001";
        $hs->dia_chi='Duong B';
        $hs->so_dien_thoai='0123';
        $hs->trang_thai=1;
        $hs->save();

        DB::table('hoc_sinh')->insert([
            ['ngay_sinh'=>'16-07-2001','username'=>'hocsinhthien1@gmail.com',
                'ho_ten'=>'Đoàn Văn Thiện','password'=>Hash::make('12345'),
                'dia_chi'=>'Đăk Nông - Việt Nam','so_dien_thoai'=>'0964980948','trang_thai'=>1],
            ['ngay_sinh'=>'16-07-2001','username'=>'hocsinhthien2@gmail.com',
                'ho_ten'=>'Trần Quang Thiện','password'=>Hash::make('12345'),
                'dia_chi'=>'Long An - Việt Nam','so_dien_thoai'=>'09001009','trang_thai'=>1],
            ['ngay_sinh'=>'16-07-2001','username'=>'hocsinhthien3@gmail.com',
                'ho_ten'=>'Trần Thanh Toàn','password'=>Hash::make('12345'),
                'dia_chi'=>'Đồng Tháp - Việt Nam','so_dien_thoai'=>'190010654','trang_thai'=>1]

        ]);
    }
}
