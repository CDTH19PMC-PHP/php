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
    
    public function regisAD(){
        return view('dashboard.regis-admin');
    }
    // Xử lý đăng ký
    public function xuLyRegisAD(Request $request){
        $giaoVien = Admin::where('username',$request->username)->first();
        if($giaoVien == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.");
        }
        $gv = new Admin();
        $gv->username = $request->username;
        $gv->password = bcrypt($request->get('password'));
        $gv->ho_ten = $request->ho_ten;
        $gv->ngay_sinh = $request->ngay_sinh;
        $gv->dia_chi = $request->dia_chi;
        $gv->so_dien_thoai = $request->so_dien_thoai;
        $gv->trang_thai = 1;
        $gv->save();
        return view('dashboard.page-login');
    }
    public function loginAD(){
        return view('dashboard.page-login');
    }
    public function xuLyloginAD(Request $request){
        //     // return view('xl-dang-nhap');
        //     dd($request);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        // Chứng thực thành công
        $user = Auth::user();
        $id = Admin::find($user->id);
       // @dd($id);
        return view('dashboard.index',compact('id'));
        }else{
            return redirect()->back()->with("error","Đăng nhập không thành công");
        }
    }
    public function indexAD($a){
        $id = Admin::find($a);
      //  @dd($id);
        return view('dashboard.index',compact('id'));
    }

    function FormThongTinCaNhanAD($id){
        $thongtin = Admin::find($id);
        return view('dashboard.form-admin-thong-tin-ca-nhan',compact('thongtin','id'));
    }
    function XuLyThongTinCaNhanAD(Request $req,$id){
        $ad = Admin::find($id);
        $ad->ho_ten=$req->ho_ten;
        $ad->ngay_sinh=$req->ngay_sinh;
        $ad->dia_chi=$req->dia_chi;
        $ad->so_dien_thoai=$req->so_dien_thoai;
        $ad->save();
        $thongtin = Admin::find($id);
        return view('dashboard.thong-tin-ca-nhan-ad',compact('thongtin','id'));
    }

    public function changePW($id){
        $thongtin = Admin::find($id); 
        return view('dashboard.form-admin-thay-doi-pw',compact('thongtin','id'));
        
    }
    
    public function updatePW(Request $request,$id) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không khớp với mật khẩu.",$id);
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","Mật khẩu mới không được giống với mật khẩu hiện tại của bạn.",$id);
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Xác nhận mật khẩu không khớp.",$id);
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

        return redirect()->back()->with("success","Mật khẩu đã được thay đổi thành công!",$id);
    }
    //////////////// danh sách quản lý Giáo Viên ///////////////////////
    public function tableDataGV($id){
        $dsGiaoVien = GiaoVien::all();
        //$giaoVien = DB::table('giao_vien')->get();
        return view('dashboard.table-data-gv',compact('dsGiaoVien','id'));
    }
    public function deleteDSGiaoVienAD($id,$id_hs){
        $gv = GiaoVien::find($id_hs);
        $gv->trang_thai = 0;
        $gv->save();
        $dsGiaoVien = GiaoVien::all();
       
        return redirect()->route('table-data-gv',$id);
    }

    // Chỉnh sửa thông tin cá nhân GV (Admin)
    public function formInformationGV($id,$id_gv){
        $thongtin = GiaoVien::find($id_gv);
        return view('dashboard.admin-quan-ly-gv-edit-form',compact('id','id_gv','thongtin'));
    }
    public function editInformationGV(Request $request,$id,$id_gv){
        $editGiaoVien = GiaoVien::find($id_gv);
        $editGiaoVien->ho_ten = $request->ho_ten;
        $editGiaoVien->ngay_sinh = $request->ngay_sinh;
        $editGiaoVien->dia_chi = $request->dia_chi;
        $editGiaoVien->so_dien_thoai = $request->so_dien_thoai;
        $editGiaoVien->save();

        $editgv = GiaoVien::find($id_gv);

        return redirect()->route('table-data-gv',['id'=>$id]);
    }

    // public function formResetPasswordGV($id){
    //     $resetPassword = GiaoVien::find($id);
    //     return view('dashboard.admin-quan-ly-gv-reset-password-form',compact('resetPassword','id'));
    // }

    public function resetPasswordGV($id,$id_gv){
        // $resetPasswordGiaoVien = GiaoVien::find($id);
        // $resetPasswordGiaoVien->password = Hash::make('123456789');
        // $resetPasswordGiaoVien->save();
        // $resetPassword = GiaoVien::find($id);
        // return view('dashboard.admin-quan-ly-gv-reset-password',compact('resetPassword','id'));
        $gv = GiaoVien::find($id_gv);
        $gv->password = Hash::make('123456789');
        $gv->save();
        $dsGiaoVien = GiaoVien::all();
        return redirect()->route('table-data-gv',$id);
    }
    //Add Giáo viên vào danh sách quản lý
    public function addGVform($id){
        return view('dashboard.admin-quan-ly-gv-add',compact('id'));
    }
    public function handleAddGV(Request $request,$id){
        $giaoVien = GiaoVien::where('username',$request->username)->first();
        if($giaoVien == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.",$id);
        }
        $gv = new GiaoVien();
        $gv->username = $request->username;
        $gv->password = Hash::make('12345');
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
        return redirect()->back()->with("success","Thêm tài khoản giáo viên thành công!",$id);
    }
    ////////////////////// danh sách quản lý Học Sinh ////////////////////
    public function tableDataHS($id){
        $dsHocSinh = HocSinh::all();
        //$giaoVien = DB::table('giao_vien')->get();
        return view('dashboard.table-data-hs',compact('dsHocSinh','id'));
    }//Xóa HocSinhn trong ds HS (change trạng thái = 0)
    public function deleteDSHocSinhAD($id,$id_hs){
        $hs = HocSinh::find($id_hs);
        $hs->trang_thai = 0;
        $hs->save();
        $dsHocSinh = HocSinh::all();
       
        return redirect()->route('table-data-hs',$id);
        // return redirect()->route('admin-quan-ly-gv',$dsGiaoVien);
    }
    

    // Chỉnh sửa thông tin cá nhân GV (Admin)
    public function formInformationHS($id,$id_hs){
    //     $ediths = HocSinh::find($id_hs);
    //     $dsHocSinh = HocSinh::all();
    //     //return view('dashboard.admin-quan-ly-hs-edit-form',compact('ediths','id'));
        
        $thongtin = HocSinh::find($id_hs);
        return view('dashboard.admin-quan-ly-hs-edit-form',compact('id','id_hs','thongtin'));
    }

    public function editInformationHS(Request $request,$id,$id_hs){
        $editHocSinh = HocSinh::find($id_hs);
        
        $editHocSinh->ho_ten = $request->ho_ten;
        $editHocSinh->ngay_sinh = $request->ngay_sinh;
        $editHocSinh->dia_chi = $request->dia_chi;
        $editHocSinh->so_dien_thoai = $request->so_dien_thoai;
        $editHocSinh->save();

        $ediths = HocSinh::find($id_hs);
        return redirect()->route('table-data-hs',['id'=>$id]);
        //return view('dashboard.admin-quan-ly-hs-info',compact('ediths','id'));
    }

    // public function formResetPasswordHS($id){
    //     $resetPassword = HocSinh::find($id);
    //     return view('dashboard.admin-quan-ly-hs-reset-password-form',compact('resetPassword','id'));
    // }

    public function resetPasswordHS($id,$id_hs){
        // $resetPasswordHocSinh = HocSinh::find($id);
        // $resetPasswordHocSinh->password = Hash::make('123456789');
        // $resetPasswordHocSinh->save();
        $hs = HocSinh::find($id_hs);
        $hs->password = Hash::make('123456789');
        $hs->save();
        $dsHocSinh = HocSinh::all();

        // $resetPassword = HocSinh::find($id);
        return redirect()->route('table-data-hs',$id);
    }
    //Add Giáo viên vào danh sách quản lý
    public function addHSform($id){
        return view('dashboard.admin-quan-ly-hs-add',compact('id'));
    }
    public function handleAddHS(Request $request,$id){
        $hocSinh = HocSinh::where('username',$request->username)->first();
        if($hocSinh == true){
            return redirect()->back()->with("error","Tài khoản đã tồn tại.",$id);
        }
        $hs = new HocSinh();
        $hs->username = $request->username;
        $hs->password = Hash::make('12345');
        $hs->ho_ten='Nguyễn Văn A';
        $hs->ngay_sinh='1/1/1900';
        $hs->dia_chi='Tp.HCM';
        $hs->so_dien_thoai='0';
        $hs->trang_thai = 1;
        $hs->save();
        return redirect()->back()->with("success","Thêm tài khoản học sinh thành công!",$id);
    }
    
}
