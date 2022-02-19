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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class GiaoVienController extends Controller
{
    function DanhSachLop($id){
        $giaovien =DB::table('giao_vien')->join('lop','giao_vien.id','=','lop.ma_giao_vien',)->where('lop.ma_giao_vien','=',$id)->get();
        $idgiaovien = $id;
        
        return view('danh-sach-lop',compact('giaovien','idgiaovien'));

    }
    function FormMoiLop($id){
        $idgiaovien =$id;
    return view('them-moi-lop',compact('idgiaovien'));}


    function ThemMoiLop(Request $req,$id){
        $lop = new Lop;
        $lop->ma_giao_vien = $id;
        $lop->so_luong = 0;
        $lop->thoi_gian= Carbon::now();
        $lop->ten_lop = $req->Mon_hoc;
        $lop->ma_lop = Str::random(5);
        $lop->trang_thai = 1;
        $lop->save();
        $req -> session()->flash('success', 'Đã tạo lớp thành công!');
        return redirect()->route('ds-lop',$id);
    }

    function ThongTinCaNhan($id){
        $thongtin = GiaoVien::find($id);
        return view('thong-tin-ca-nhan',compact('thongtin'));
    }
    function FormSuaTinCaNhan($id){
        $thongtin = GiaoVien::find($id);
        return view('sua-thong-tin-ca-nhan',compact('thongtin'));
    }     
    function SuaThongTinCaNhan(Request $req,$id){
        $gv = GiaoVien::find($id);
        $gv->ho_ten=$req->ho_ten;
        $gv->username = $req->email;
        $gv->ngay_sinh=$req->ngay_sinh;
        $gv->dia_chi=$req->dia_chi;
        $gv->so_dien_thoai=$req->so_dien_thoai;
        $gv->save();

        $req -> session()->flash('success', 'Cập nhập thông tin thành công!');
        $idgiaovien = $id;
        $thongtin = GiaoVien::find($id);

        $giaovien =DB::table('giao_vien')->join('lop','giao_vien.id','=','lop.ma_giao_vien')->where('ma_giao_vien','=',$id)->get();
        
        return view('thong-tin-ca-nhan',compact('thongtin'));

    }
    function DanhSachHocSinh($idgv, $idlop){
        $thongtinlop = DB::table('hoc_sinh')->join('hoc_sinh_hoc_lop','hoc_sinh.id','=','hoc_sinh_hoc_lop.ma_hoc_sinh')->where('ma_lop','=',$idlop)->where('trang_thai_lop','=','1')->get();
        $lop =Lop::find($idlop);
        $giaovien = GiaoVien::find($idgv);
       
        
    return view('edit-danh-sach-lop',compact('thongtinlop','lop','giaovien'));}
    function FormThemHS($gv,$id){
        $giaovien = $gv;
        $lop = $id;
        return view('them-moi-hoc-sinh',compact('giaovien','lop'));
    }

    function ThemHocSinh(Request $req,$idgv,$idlop){
       
        $hocsinh = DB::table('hoc_sinh')->select('id')->where('username','like',$req->email)->get();
        $allhocisnh =DB::table('hoc_sinh_hoc_lop')->where('ma_lop','=',$idlop)->get();
        $diem = 0;
        foreach($hocsinh as $hocsinhs){
            foreach($allhocisnh as $all){
                if($all->ma_hoc_sinh == $hocsinhs->id)
                $diem++;
            }
            if($diem == 0){
        $hs = new HocSinhThuocLop;
        $hs->ma_hoc_sinh = $hocsinhs->id;
        $hs->ma_lop=$idlop;
        $hs->trang_thai_lop = 1;
        $hs->save();
        $tanghocsinh = Lop::find($idlop);
        $tanghocsinh->so_luong = $tanghocsinh->so_luong +1;
        $tanghocsinh->save();
        $req -> session()->flash('success1', 'Đã thêm học sinh vô lớp thành công!');
        return redirect()->route('ds-hoc-sinh',['gv'=>$idgv,'id'=>$idlop]);
    }
        else{
            $req -> session()->flash('success2', 'Đã có học sinh này trong lớp');
            return redirect()->route('ds-hoc-sinh',['gv'=>$idgv,'id'=>$idlop]);
        }
     }
     if($diem == 0){
         
        $req -> session()->flash('success3', 'Không tồn tại học sinh này');
        return redirect()->route('ds-hoc-sinh',['gv'=>$idgv,'id'=>$idlop]);
     }
    }
    function formxoalop(Request $req,$gv,$id){
        $lop = Lop::find($id);
        $lop->trang_thai=0;
        $lop->save();
        $giaovien =DB::table('giao_vien')->join('lop','giao_vien.id','=','lop.ma_giao_vien')->where('ma_giao_vien','=',$id)->get();
        $req -> session()->flash('success', 'Lớp đã bị xoá');
        return redirect()->route('ds-lop',$gv);
    }

    function FormDuyet($gv, $id){
        $hs = DB::table('hoc_sinh_hoc_lop')->join('hoc_sinh','hoc_sinh_hoc_lop.ma_hoc_sinh','=','hoc_sinh.id')->select('hoc_sinh_hoc_lop.id','ma_hoc_sinh','username','ho_ten')->where('ma_lop','=',$id)->where('trang_thai_lop','=',0)->get();
        $giaovien = $gv;
        $lop = $id;
        return view('form-duyet-hoc-sinh',compact('giaovien','lop','hs'));
    }
    function Duyet($gv, $id, $hs1, Request $req){
        $duyet = HocSinhThuocLop::find($hs1);
        $duyet->trang_thai_lop = 1;
        $duyet->save();
        $tanghocsinh = Lop::find($id);
        $tanghocsinh->so_luong = $tanghocsinh->so_luong +1;
        $tanghocsinh->save();
        $req -> session()->flash('success', 'Đã chấp nhận học sinh vào lớp');

        $hs = DB::table('hoc_sinh_hoc_lop')->join('hoc_sinh','hoc_sinh_hoc_lop.ma_hoc_sinh','=','hoc_sinh.id')->select('hoc_sinh_hoc_lop.id','ma_hoc_sinh','username','ho_ten')->where('ma_lop','=',$id)->where('trang_thai_lop','=',0)->get();
        $giaovien = $gv;
        $lop = $id;
        return view('form-duyet-hoc-sinh',compact('giaovien','lop','hs'));
    }

    ///////////////// Trần Quang Thiện ////////////
    public function dangKyGV(){
        return view('singup-gv');
    }
    // Xử lý đăng ký
    public function xuLyDangKyGV(Request $request){
        $giaoVien = GiaoVien::where('username',$request->username)->first();
        if($giaoVien == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.");
        }
        $gv = new GiaoVien();
        $gv->username = $request->username;
        $gv->password = bcrypt($request->get('password'));
        $gv->ho_ten = $request->ho_ten;
        $gv->ngay_sinh = $request->ngay_sinh;
        $gv->dia_chi = $request->dia_chi;
        $gv->so_dien_thoai = $request->so_dien_thoai;
        $gv->trang_thai = 1;
        $gv->save();
        return view('dang-nhap-giaovien');
    }
    public function dangNhapGV(){
        return view('dang-nhap-giaovien');
    }
    //Xử lý Đăng nhập
    public function xuLyDangNhapGV(Request $request){
        $gv = GiaoVien::where('username',$request->username)->first();
        if(empty($gv)){
            echo "Tên đăng nhập không đúng";
        }elseif(!Hash::check($request->password,$gv->password)){
            echo "Mật khẩu không đúng";
        }else{
            return redirect()->route('ds-lop',$gv->id);
        }
    }
    ///////////////// Trần Quang Thiện ////////////
   
}
