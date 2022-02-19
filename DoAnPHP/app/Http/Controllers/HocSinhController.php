<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\GiaoVien;
use App\Models\HocSinh;
use App\Models\HocSinhThuocLop;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Hash;
class HocSinhController extends Controller
{
    function DanhSachLop($id){
        $danhsachlop = DB::table('lop')->join('hoc_sinh_hoc_lop','lop.id','=','hoc_sinh_hoc_lop.ma_lop')->select('lop.ma_lop','so_luong','ten_lop','trang_thai')->where('hoc_sinh_hoc_lop.ma_hoc_sinh','=',$id)->where('hoc_sinh_hoc_lop.trang_thai_lop','=','1')->get();
        
        $idhs = $id;
        return view('hoc-sinh-danh-sach-lop',compact('danhsachlop','idhs'));
    }
    function ThongTinCaNhan($id){
        $thongtin = HocSinh::find($id);
        return view('hoc-sinh-thong-tin-ca-nhan',compact('thongtin'));
    }
    function FormThongTinCaNhan($id){
        $thongtin = HocSinh::find($id);
        return view('form-hoc-sinh-thong-tin-ca-nhan',compact('thongtin'));
    }
    function XuLyThongTinCaNhan(Request $req,$id){
        $hs = HocSinh::find($id);
        $hs->ho_ten=$req->ho_ten;
        $hs->username=$req->email;
        $hs->ngay_sinh=$req->ngay_sinh;
        $hs->dia_chi=$req->dia_chi;
        $hs->so_dien_thoai=$req->so_dien_thoai;
        $hs->save();
        $req -> session()->flash('success', 'Cập nhập thông tin thành công!');
        $thongtin = HocSinh::find($id);
        return view('hoc-sinh-thong-tin-ca-nhan',compact('thongtin'));
    }
    function ThemLopMoi(Request $req,$id){
        $lop =  DB::table('lop')->select('id','trang_thai')->where('ma_lop','=',$req->code)->get();
        $alllop = DB::table('hoc_sinh_hoc_lop')->where('ma_hoc_sinh','=',$id)->get();
        $diem = 0;
        foreach($lop as $l){
            if($l->trang_thai == 0){
                $req ->session()->flash('success1','Lớp này đã bị xoá, vui lòng nhập lại!');
                $danhsachlop = DB::table('lop')->join('hoc_sinh_hoc_lop','lop.id','=','hoc_sinh_hoc_lop.ma_lop')->select('lop.ma_lop','so_luong','ten_lop','trang_thai')->where('hoc_sinh_hoc_lop.ma_hoc_sinh','=',$id)->get();
        
                $idhs = $id;
                return view('hoc-sinh-danh-sach-lop',compact('danhsachlop','idhs'));
            }
            else{
            foreach($alllop as $l2){
                if($l2->ma_lop == $l->id)
                $diem++;
            }
            if($diem == 0 ){
                $hs = new HocSinhThuocLop;
                $hs->ma_lop = $l->id;
                $hs->ma_hoc_sinh=$id;
                $hs->trang_thai_lop = 0;
                $hs->save();
                $req ->session()->flash('success2','Đã xin vào lớp thành công, vui lòng đợi giáo viên chấp nhận!');

                $danhsachlop = DB::table('lop')->join('hoc_sinh_hoc_lop','lop.id','=','hoc_sinh_hoc_lop.ma_lop')->select('lop.ma_lop','so_luong','ten_lop','trang_thai')->where('hoc_sinh_hoc_lop.ma_hoc_sinh','=',$id)->where('hoc_sinh_hoc_lop.trang_thai_lop','=','1')->get();
        
                $idhs = $id;
                return view('hoc-sinh-danh-sach-lop',compact('danhsachlop','idhs'));
            }
            else{
                $req ->session()->flash('success3','Bạn đã tham gia lớp này!');
                $danhsachlop = DB::table('lop')->join('hoc_sinh_hoc_lop','lop.id','=','hoc_sinh_hoc_lop.ma_lop')->select('lop.ma_lop','so_luong','ten_lop','trang_thai')->where('hoc_sinh_hoc_lop.ma_hoc_sinh','=',$id)->get();
        
                $idhs = $id;
                return view('hoc-sinh-danh-sach-lop',compact('danhsachlop','idhs'));
            }

        }
    }
        if ($diem == 0)
        {
            $req ->session()->flash('success4','Không tồn tại lớp này!');
        }
        $danhsachlop = DB::table('lop')->join('hoc_sinh_hoc_lop','lop.id','=','hoc_sinh_hoc_lop.ma_lop')->select('lop.ma_lop','so_luong','ten_lop','trang_thai')->where('hoc_sinh_hoc_lop.ma_hoc_sinh','=',$id)->get();
        
        $idhs = $id;
        return view('hoc-sinh-danh-sach-lop',compact('danhsachlop','idhs'));
    }
    ///////////////// Trần Quang Thiện ////////////
    public function dangKyHS(){
        return view('signup-hs');
    }
    // Xử lý đăng ký
    public function xuLyDangKyHS(Request $request){
        $hocSinh = HocSinh::where('username',$request->username)->first();
        if($hocSinh == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.");
        }
        $hs = new HocSinh();
        $hs->username = $request->username;
        $hs->password = bcrypt($request->get('password'));
        $hs->ho_ten = $request->ho_ten;
        $hs->ngay_sinh = $request->ngay_sinh;
        $hs->dia_chi = $request->dia_chi;
        $hs->so_dien_thoai = $request->so_dien_thoai;
        $hs->trang_thai = 1;
        $hs->save();
        return view('dang-nhap');
    }
    public function dangNhapHS(){
        return view('dang-nhap');
    }

    public function xuLyDangNhapHS(Request $request){
        $hocsinh = Hocsinh::where('username',$request->username)->first();

        $danhsachlop = DB::table('lop')->join('hoc_sinh_hoc_lop','lop.id','=','hoc_sinh_hoc_lop.ma_lop')->select('lop.ma_lop','so_luong','ten_lop','trang_thai')->where('hoc_sinh_hoc_lop.ma_hoc_sinh','=',$hocsinh->id)->where('hoc_sinh_hoc_lop.trang_thai_lop','=','1')->get();
        
        $idhs = $hocsinh->id;
     
        if(empty($hocsinh)){
            echo "Tên đăng nhập không đúng";
        }elseif(!Hash::check($request->password,$hocsinh->password)){
            echo "Mật khẩu không đúng";
        }else{
            return redirect()->route('ds-hs-lop',$hocsinh->id);
          
        }
    }
    ///////////////// Trần Quang Thiện ////////////
}
