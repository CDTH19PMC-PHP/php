<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiangVienController;
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
Route::get('/', function(){
    return view('login');
})->name('login');

// Giảng viên

Route::get('/giao-vien/{id}',[GiangVienController::class, 'DanhSachLop'])->name('ds-lop');

Route::get('/giao-vien/them-lop/{id}',[GiangVienController::class,'FormMoiLop'])->name('them-lop');

Route::post('/giao-vien/them-lop/{id}',[GiangVienController::class,'ThemMoiLop'])->name('xuly-them-lop');

Route::get('/giao-vien/thong-tin-ca-nhan/{id}',[GiangVienController::class,'ThongTinCaNhan'])->name('thong-tin-ca-nhan');
Route::get('/giao-vien/thong-tin-ca-nhan/chinh-sua/{id}',[GiangVienController::class,'FormSuaTinCaNhan'])->name('chinh-sua');
Route::post('/giao-vien/thong-tin-ca-nhan/chinh-sua/{id}',[GiangVienController::class,'SuaThongTinCaNhan'])->name('xuly-chinh-sua');
Route::get('giao-vien/xoa-lop/{gv}/{id}',[GiangVienController::class,'formxoalop'])->name('from-xoa-lop');

Route::get('giao-vien/thong-tin-lop/{gv}/{id}',[GiangVienController::class,'DanhSachHocSinh'])->name('ds-hoc-sinh');

Route::get('giao-vien/thong-tin-lop/them-hoc-sinh/{gv}/{id}',[GiangVienController::class,'FormThemHS'])->name('form-them-hoc-sinh');
Route::post('giao-vien/thong-tin-lop/them-hoc-sinh/{gv}/{id}',[GiangVienController::class,'ThemHocSinh'])->name('xl-them-hoc-sinh');

Route::get('giao-vien/thong-tin-lop/danh-sach-duyet/{gv}/{id}',[GiangVienController::class,'FormDuyet'])->name('form-duyet-hoc-sinh');
Route::get('giao-vien/thong-tin-lop/danh-sach-duyet/hoc-sinh/{gv}/{id}/{hs}',[GiangVienController::class,'Duyet'])->name('xl-duyet-hoc-sinh');

// Học sinh
Route::get('/hoc-sinh/{id}',[HocSinhController::class,'DanhSachLop'])->name('ds-hs-lop');
Route::post('/hoc-sinh/{id}',[HocSinhController::class,'ThemLopMoi'])->name('hs-them-lop');

Route::get('hoc-sinh/thong-tin-ca-nhan/{id}',[HocSinhController::class,'ThongTinCaNhan'])->name('hs-thong-tin-ca-nhan');

Route::get('hoc-sinh/thong-tin-ca-nhan/chinh-sua/{id}',[HocSinhController::class,'FormThongTinCaNhan'])->name('form-thong-tin-ca-nhan');
Route::post('hoc-sinh/thong-tin-ca-nhan/chinh-sua/{id}',[HocSinhController::class,'XuLyThongTinCaNhan'])->name('xl-thong-tin-ca-nhan');

// Admin
Route::get('/admin/{id}',[AdminController::class,'DanhSachLop'])->name('admin-ds-lop');