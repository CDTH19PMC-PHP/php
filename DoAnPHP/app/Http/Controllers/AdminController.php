<?php

namespace App\Http\Controllers;
use App\Models\Lop;
use App\Models\GiaoVien;
use App\Models\HocSinh;
use App\Models\HocSinhThuocLop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    function DanhSachLop($id){
        $dslop = Lop::all();
        $giaovien =DB::table('giao_vien')->join('lop','giao_vien.id','=','lop.ma_giao_vien',)->get();
        $idgiaovien = $id;
        
        return view('admin-danh-sach-lop',compact('giaovien','idgiaovien'));
    }
}
