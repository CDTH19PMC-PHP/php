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
Route::get('/dang-nhap', [HocSinhController::class,'dangNhapHS'])->name('dang-nhap-hs');
Route::post('/dang-nhap', [HocSinhController::class,'xuLyDangNhapHS'])->name('xl-dang-nhap-hs');
//
Route::get('/dang-nhap-giaovien', [GiaoVienController::class,'dangNhapGV'])->name('dang-nhap-gv');
Route::post('/dang-nhap-giaovien', [GiaoVienController::class,'xuLyDangNhapGV'])->name('xl-dang-nhap-gv');
//
Route::get('/dang-nhap-admin', [AdminController::class,'dangNhapAD'])->name('dang-nhap-ad');
Route::post('/dang-nhap-admin', [AdminController::class,'xuLyDangNhapAD'])->name('xl-dang-nhap-ad');
//
Route::get('/admin/thong-tin-ca-nhan/{id}',[AdminController::class,'FormThongTinCaNhanAD'])->name('form-thong-tin-ca-nhan-ad');
Route::post('/admin/thong-tin-ca-nhan/{id}',[AdminController::class,'XuLyThongTinCaNhanAD'])->name('xl-chinh-sua-tt-ad');
//
Route::get('/form-admin-thay-doi-pw/{id}',[AdminController::class,'changePW'])->name('changePW');
// Route::match(['get','post'], '/form-admin-thay-doi-pw/{id}',[AdminController::class,'update-pw'])->name('update-pw');
Route::post('/form-admin-thay-doi-pw/{id}',[AdminController::class,'updatePW'])->name('update-pw');

//=========== Quản lý Giáo Viên =========== //
// Danh sách giáo viên
Route::get('/admin-quan-ly-gv',[AdminController::class,'dsGiaoVienAD'])->name('ds-quan-ly-gv');
// Thêm giáo viên
//=========== Quản lý Học Sinh =========== //
// Danh sách học sinh
Route::get('/admin-quan-ly-hs',[AdminController::class,'dsHocSinhAD'])->name('ds-quan-ly-hs');
///////////////// Trần Quang Thiện ////////////
///////////////// Trần Quang Thiện ////////////