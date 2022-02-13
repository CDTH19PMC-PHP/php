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
    // public function dangNhapAD(){
    //     return view('dang-nhap');
    // }

    // //Xử lý Đăng nhập
    // public function xuLyDangNhapAD(Request $request){
    //     //     // return view('xl-dang-nhap');
    //     //     dd($request);
    //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
    //     // Chứng thực thành công
    //     $user = Auth::user();
        
    //     }else{
    //         echo 'Đăng nhập không thành công';
    //     }
    // }
    public function loginAD(){
        return view('dashboard.page-login');
    }
    public function xuLyloginAD(Request $request){
        //     // return view('xl-dang-nhap');
        //     dd($request);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        // Chứng thực thành công
        $user = Auth::user();
        return view('dashboard.index');
        }else{
            echo 'Đăng nhập không thành công';
        }
    }
    public function indexAD(){
        return view('dashboard.index');
    }

    function FormThongTinCaNhanAD($id){
        $thongtin = Admin::find($id);
        return view('dashboard.form-admin-thong-tin-ca-nhan',compact('thongtin'));
    }
    function XuLyThongTinCaNhanAD(Request $req,$id){
        $ad = Admin::find($id);
        $ad->ho_ten=$req->ho_ten;
        $ad->ngay_sinh=$req->ngay_sinh;
        $ad->dia_chi=$req->dia_chi;
        $ad->so_dien_thoai=$req->so_dien_thoai;
        $ad->save();
        $thongtin = Admin::find($id);
        return view('dashboard.thong-tin-ca-nhan-ad',compact('thongtin'));
    }

    public function changePW($id){
        $change = Admin::find($id); 
        return view('dashboard.form-admin-thay-doi-pw',compact('change'));
        
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
    //////////////// danh sách quản lý Giáo Viên ///////////////////////
    public function tableDataGV(){
        $dsGiaoVien = GiaoVien::all();
        //$giaoVien = DB::table('giao_vien')->get();
        return view('dashboard.table-data-gv',compact('dsGiaoVien'));
    }
    public function deleteDSGiaoVienAD($id){
        $gv = GiaoVien::find($id);
        $gv->trang_thai = 0;
        $gv->save();
        $dsGiaoVien = GiaoVien::all();
       
        return view('dashboard.table-data-gv',compact('dsGiaoVien'));
        // return redirect()->route('admin-quan-ly-gv',$dsGiaoVien);
    }

    // Chỉnh sửa thông tin cá nhân GV (Admin)
    public function formInformationGV($id){
        $editgv = GiaoVien::find($id);
        return view('dashboard.admin-quan-ly-gv-edit-form',compact('editgv'));
    }
    public function editInformationGV(Request $request,$id){
        $editGiaoVien = GiaoVien::find($id);
        $editGiaoVien->username = $request->username;
        $editGiaoVien->ho_ten = $request->ho_ten;
        $editGiaoVien->ngay_sinh = $request->ngay_sinh;
        $editGiaoVien->dia_chi = $request->dia_chi;
        $editGiaoVien->so_dien_thoai = $request->so_dien_thoai;
        $editGiaoVien->save();

        $editgv = GiaoVien::find($id);

        return view('dashboard.admin-quan-ly-gv-info',compact('editgv'));
    }

    public function formResetPasswordGV($id){
        $resetPassword = GiaoVien::find($id);
        return view('dashboard.admin-quan-ly-gv-reset-password-form',compact('resetPassword'));
    }

    public function resetPasswordGV($id){
        $resetPasswordGiaoVien = GiaoVien::find($id);
        $resetPasswordGiaoVien->password = Hash::make('123456789');
        $resetPasswordGiaoVien->save();

        $resetPassword = GiaoVien::find($id);
        return view('dashboard.admin-quan-ly-gv-reset-password',compact('resetPassword'));
    }
    //Add Giáo viên vào danh sách quản lý
    public function addGVform(){
        return view('dashboard.admin-quan-ly-gv-add');
    }
    public function handleAddGV(Request $request){
        $giaoVien = GiaoVien::where('username',$request->username)->first();
        if($giaoVien == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.");
        }
        $gv = new GiaoVien();
        $gv->username = $request->username;
        $gv->password = Hash::make('123456789');
        // $gv->ho_ten=$request->ho_ten;
        // $gv->ngay_sinh=$request->ngay_sinh;
        // $gv->dia_chi=$request->dia_chi;
        // $gv->so_dien_thoai=$request->so_dien_thoai;
        $gv->ho_ten='Nguyễn Văn A';
        $gv->ngay_sinh='1/1/1900';
        $gv->dia_chi='Tp.HCM';
        $gv->so_dien_thoai='0';
        $gv->trang_thai = 1;
        $gv->save();
        return redirect()->back()->with("success","Thêm tài khoản giáo viên thành công!");
    }
    ////////////////////// danh sách quản lý Học Sinh ////////////////////
    public function tableDataHS(){
        $dsHocSinh = HocSinh::all();
        //$giaoVien = DB::table('giao_vien')->get();
        return view('dashboard.table-data-hs',compact('dsHocSinh'));
    }//Xóa Giáo Viên trong ds GV (change trạng thái = 0)
    public function deleteDSHocSinhAD($id){
        $hs = HocSinh::find($id);
        $hs->trang_thai = 0;
        $hs->save();
        $dsHocSinh = HocSinh::all();
       
        return view('dashboard.table-data-hs',compact('dsHocSinh'));
        // return redirect()->route('admin-quan-ly-gv',$dsGiaoVien);
    }

    // Chỉnh sửa thông tin cá nhân GV (Admin)
    public function formInformationHS($id){
        $ediths = HocSinh::find($id);
        return view('dashboard.admin-quan-ly-hs-edit-form',compact('ediths'));
    }
    public function editInformationHS(Request $request,$id){
        $editHocSinh = HocSinh::find($id);
        $editHocSinh->username = $request->username;
        $editHocSinh->ho_ten = $request->ho_ten;
        $editHocSinh->ngay_sinh = $request->ngay_sinh;
        $editHocSinh->dia_chi = $request->dia_chi;
        $editHocSinh->so_dien_thoai = $request->so_dien_thoai;
        $editHocSinh->save();

        $ediths = HocSinh::find($id);

        return view('dashboard.admin-quan-ly-hs-info',compact('ediths'));
    }

    public function formResetPasswordHS($id){
        $resetPassword = HocSinh::find($id);
        return view('dashboard.admin-quan-ly-hs-reset-password-form',compact('resetPassword'));
    }

    public function resetPasswordHS($id){
        $resetPasswordHocSinh = HocSinh::find($id);
        $resetPasswordHocSinh->password = Hash::make('123456789');
        $resetPasswordHocSinh->save();

        $resetPassword = HocSinh::find($id);
        return view('dashboard.admin-quan-ly-hs-reset-password',compact('resetPassword'));
    }
    //Add Giáo viên vào danh sách quản lý
    public function addHSform(){
        return view('dashboard.admin-quan-ly-hs-add');
    }
    public function handleAddHS(Request $request){
        $hocSinh = HocSinh::where('username',$request->username)->first();
        if($hocSinh == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.");
        }
        $hs = new HocSinh();
        $hs->username = $request->username;
        $hs->password = Hash::make('123456789');
        // $gv->ho_ten=$request->ho_ten;
        // $gv->ngay_sinh=$request->ngay_sinh;
        // $gv->dia_chi=$request->dia_chi;
        // $gv->so_dien_thoai=$request->so_dien_thoai;
        $hs->ho_ten='Nguyễn Văn A';
        $hs->ngay_sinh='1/1/1900';
        $hs->dia_chi='Tp.HCM';
        $hs->so_dien_thoai='0';
        $hs->trang_thai = 1;
        $hs->save();
        return redirect()->back()->with("success","Thêm tài khoản học sinh thành công!");
    }
    
}
