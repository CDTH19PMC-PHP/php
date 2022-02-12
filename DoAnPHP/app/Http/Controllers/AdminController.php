<?php

namespace App\Http\Controllers;
use App\Models\Lop;
use App\Models\GiaoVien;
use App\Models\HocSinh;
use App\Models\HocSinhThuocLop;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Hash;


class AdminController extends Controller
{
    function DanhSachLop($id){
        $dslop = Lop::all();
        $giaovien =DB::table('giao_vien')->join('lop','giao_vien.id','=','lop.ma_giao_vien',)->get();
        $idgiaovien = $id;
        
        return view('admin-danh-sach-lop',compact('giaovien','idgiaovien'));
    }
    ///////////////// Trần Quang Thiện ////////////
    public function dangNhapAD(){
        return view('dang-nhap');
    }

    //Xử lý Đăng nhập
    public function xuLyDangNhapAD(Request $request){
        //     // return view('xl-dang-nhap');
        //     dd($request);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        // Chứng thực thành công
        $user = Auth::user();
        
        }else{
            echo 'Đăng nhập không thành công';
        }
    }
    function FormThongTinCaNhanAD($id){
        $thongtin = Admin::find($id);
        return view('form-admin-thong-tin-ca-nhan',compact('thongtin'));
    }
    function XuLyThongTinCaNhanAD(Request $req,$id){
        $ad = Admin::find($id);
        $ad->ho_ten=$req->ho_ten;
        $ad->ngay_sinh=$req->ngay_sinh;
        $ad->dia_chi=$req->dia_chi;
        $ad->so_dien_thoai=$req->so_dien_thoai;
        $ad->save();
        $thongtin = Admin::find($id);
        return view('thong-tin-ca-nhan-ad',compact('thongtin'));
    }

    public function changePW($id){
        $change = Admin::find($id); 
        return view('form-admin-thay-doi-pw',compact('change'));
        
    }
    
    public function updatePW(Request $request) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không khớp với mật khẩu.");
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","Mật khẩu mới không được giống với mật khẩu hiện tại của bạn.");
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Xác nhận mật khẩu không khớp.");
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|string|min:5',
            'password_cf' => 'required|same:password_new',
        ]);

        //Thay đổi password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        return redirect()->back()->with("success","Mật khẩu đã được thay đổi thành công!");
    }

    // danh sách quản lý Giáo Viên
    public function dsGiaoVienAD(){
        $dsGiaoVien = GiaoVien::all();
        //$giaoVien = DB::table('giao_vien')->get();
        return view('admin-quan-ly-gv',compact('dsGiaoVien'));
    }

    // danh sách quản lý Học Sinh
    public function dsHocSinhAD(){
        $dsHocSinh = HocSinh::all();
        //$giaoVien = DB::table('giao_vien')->get();
        return view('admin-quan-ly-hs',compact('dsHocSinh'));
    }
    //////////////////////////////////////////
    public function loginAD(){
        return view('dashboard.page-login');
    }
}
