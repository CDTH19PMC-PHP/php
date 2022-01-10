<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ad = new Admin();
        $ad->username = 'admin@gmail.com';
        $ad->password = Hash::make('12345');
        $ad->ho_ten='nguyenadmin';
        $ad->ngay_sinh="16/7/2001";
        $ad->dia_chi='Duong B';
        $ad->so_dien_thoai='0123';
        $ad->trang_thai=1;
        $ad->save();

        DB::table('admin')->insert([
            ['ngay_sinh'=>'16-07-2001','username'=>'adminthien1@gmail.com',
                'ho_ten'=>'Đoàn Văn Thiện','password'=>Hash::make('12345'),
                'dia_chi'=>'Đăk Nông - Việt Nam','so_dien_thoai'=>'0964980948','trang_thai'=>1],
            ['ngay_sinh'=>'16-07-2001','username'=>'adminthien2@gmail.com',
                'ho_ten'=>'Trần Quang Thiện','password'=>Hash::make('12345'),
                'dia_chi'=>'Long An - Việt Nam','so_dien_thoai'=>'09001009','trang_thai'=>1],
            ['ngay_sinh'=>'16-07-2001','username'=>'adminthien3@gmail.com',
                'ho_ten'=>'Trần Thanh Toàn','password'=>Hash::make('12345'),
                'dia_chi'=>'Đồng Tháp - Việt Nam','so_dien_thoai'=>'190010654','trang_thai'=>1]

        ]);
    }
}
