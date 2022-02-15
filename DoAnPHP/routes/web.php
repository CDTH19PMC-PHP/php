<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiaoVienController;
use App\Http\Controllers\HocSinhController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[HocSinhController::class,'dangNhapHS']);

// Giảng viên

Route::get('/giao-vien/{id}',[GiaoVienController::class, 'DanhSachLop'])->name('ds-lop');

Route::get('/giao-vien/them-lop/{id}',[GiaoVienController::class,'FormMoiLop'])->name('them-lop');

Route::post('/giao-vien/them-lop/{id}',[GiaoVienController::class,'ThemMoiLop'])->name('xuly-them-lop');

Route::get('/giao-vien/thong-tin-ca-nhan/{id}',[GiaoVienController::class,'ThongTinCaNhan'])->name('thong-tin-ca-nhan');
Route::get('/giao-vien/thong-tin-ca-nhan/chinh-sua/{id}',[GiaoVienController::class,'FormSuaTinCaNhan'])->name('chinh-sua');
Route::post('/giao-vien/thong-tin-ca-nhan/chinh-sua/{id}',[GiaoVienController::class,'SuaThongTinCaNhan'])->name('xuly-chinh-sua');
Route::get('giao-vien/xoa-lop/{gv}/{id}',[GiaoVienController::class,'formxoalop'])->name('from-xoa-lop');

Route::get('giao-vien/thong-tin-lop/{gv}/{id}',[GiaoVienController::class,'DanhSachHocSinh'])->name('ds-hoc-sinh');

Route::get('giao-vien/thong-tin-lop/them-hoc-sinh/{gv}/{id}',[GiaoVienController::class,'FormThemHS'])->name('form-them-hoc-sinh');
Route::post('giao-vien/thong-tin-lop/them-hoc-sinh/{gv}/{id}',[GiaoVienController::class,'ThemHocSinh'])->name('xl-them-hoc-sinh');

Route::get('giao-vien/thong-tin-lop/danh-sach-duyet/{gv}/{id}',[GiaoVienController::class,'FormDuyet'])->name('form-duyet-hoc-sinh');
Route::get('giao-vien/thong-tin-lop/danh-sach-duyet/hoc-sinh/{gv}/{id}/{hs}',[GiaoVienController::class,'Duyet'])->name('xl-duyet-hoc-sinh');

// Học sinh
Route::get('/hoc-sinh/{id}',[HocSinhController::class,'DanhSachLop'])->name('ds-hs-lop');
Route::post('/hoc-sinh/{id}',[HocSinhController::class,'ThemLopMoi'])->name('hs-them-lop');

Route::get('hoc-sinh/thong-tin-ca-nhan/{id}',[HocSinhController::class,'ThongTinCaNhan'])->name('hs-thong-tin-ca-nhan');

Route::get('hoc-sinh/thong-tin-ca-nhan/chinh-sua/{id}',[HocSinhController::class,'FormThongTinCaNhan'])->name('form-thong-tin-ca-nhan');
Route::post('hoc-sinh/thong-tin-ca-nhan/chinh-sua/{id}',[HocSinhController::class,'XuLyThongTinCaNhan'])->name('xl-thong-tin-ca-nhan');

// Admin
Route::get('/admin/{id}',[AdminController::class,'DanhSachLop'])->name('admin-ds-lop');

///////////////// Trần Quang Thiện ////////////
///////////////// Trần Quang Thiện ////////////

///////////////// Học Sinh (Admin) ////////////
    Route::get('/dang-nhap', [HocSinhController::class,'dangNhapHS'])->name('dang-nhap-hs');
    Route::post('/dang-nhap', [HocSinhController::class,'xuLyDangNhapHS'])->name('xl-dang-nhap-hs');
            ///// Danh sách học sinh /////
    Route::get('/table-data-hs',[AdminController::class,'tableDataHS'])->name('table-data-hs');
    // Thêm học sinh
    Route::get('/admin-quan-ly-hs-add',[AdminController::class,'addHSform'])->name('add-hs-form');
    Route::post('/admin-quan-ly-hs-add',[AdminController::class,'handleAddHS'])->name('handle-add-hs');
    // Xóa
    Route::get('/admin-quan-ly-hs/{id}',[AdminController::class,'deleteDSHocSinhAD'])->name('xoa-ds-quan-ly-hs');
    // Sửa
    Route::get('/admin-quan-ly-hs-edit/{id}',[AdminController::class,'formInformationHS'])->name('form-information-hs');
    Route::post('/admin-quan-ly-hs-edit/{id}',[AdminController::class,'editInformationHS'])->name('edit-information-hs');
    // Reset password
    Route::get('/admin-quan-ly-reset-password-hs/{id}',[AdminController::class,'formResetPasswordHS'])->name('form-reset-password-hs');
    Route::post('/admin-quan-ly-reset-password-hs/{id}',[AdminController::class,'resetPasswordHS'])->name('reset-password-hs');

///////////////// Giáo Viên (Admin) ////////////
    Route::get('/dang-nhap-giaovien', [GiaoVienController::class,'dangNhapGV'])->name('dang-nhap-gv');
    Route::post('/dang-nhap-giaovien', [GiaoVienController::class,'xuLyDangNhapGV'])->name('xl-dang-nhap-gv');
            ///// Danh sách giáo viên /////
    Route::get('/table-data-gv',[AdminController::class,'tableDataGV'])->name('table-data-gv');
    // Thêm giáo viên
    Route::get('/admin-quan-ly-gv-add',[AdminController::class,'addGVform'])->name('add-gv-form');
    Route::post('/admin-quan-ly-gv-add',[AdminController::class,'handleAddGV'])->name('handle-add-gv');
    // Xóa
    Route::get('/admin-quan-ly-gv/{id}',[AdminController::class,'deleteDSGiaoVienAD'])->name('xoa-ds-quan-ly-gv');
    // Sửa
    Route::get('/admin-quan-ly-gv-edit/{id}',[AdminController::class,'formInformationGV'])->name('form-information-gv');
    Route::post('/admin-quan-ly-gv-edit/{id}',[AdminController::class,'editInformationGV'])->name('edit-information-gv');
    // Reset password
    Route::get('/admin-quan-ly-reset-password-gv/{id}',[AdminController::class,'formResetPasswordGV'])->name('form-reset-password-gv');
    Route::post('/admin-quan-ly-reset-password-gv/{id}',[AdminController::class,'resetPasswordGV'])->name('reset-password-gv');

//////////////// Admin ////////////
    Route::get('/page-login',[AdminController::class,'loginAD'])->name('login-ad');
    Route::post('/page-login', [AdminController::class,'xuLyloginAD'])->name('xl-login-ad');
            ///// Index Admin /////
    Route::get('/index-admin',[AdminController::class,'indexAD'])->name('index-ad');
            ///// Đăng ký tài khoản Admin /////
    Route::get('/regis-admin',[AdminController::class,'regisAD'])->name('regis-ad');
            ///// Thông Tin Cá Nhân Admin /////
    Route::get('/admin/thong-tin-ca-nhan/{id}',[AdminController::class,'FormThongTinCaNhanAD'])->name('form-thong-tin-ca-nhan-ad');
    Route::post('/admin/thong-tin-ca-nhan/{id}',[AdminController::class,'XuLyThongTinCaNhanAD'])->name('xl-chinh-sua-tt-ad');
            ///// Thay Đổi Mật Khẩu Admin /////
    Route::get('/form-admin-thay-doi-pw/{id}',[AdminController::class,'changePW'])->name('changePW');
    Route::post('/form-admin-thay-doi-pw/{id}',[AdminController::class,'updatePW'])->name('update-pw');

///////////////// Trần Quang Thiện ////////////
///////////////// Trần Quang Thiện ////////////







