<?php

use Illuminate\Support\Facades\Route;
use App\TheLoai;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/dang-nhap', 'UserController@getDangNhapAdmin');
Route::post('admin/dang-nhap', 'UserController@postDangNhapAdmin'); 
Route::get('admin/dang-xuat', 'UserController@getDangXuatAdmin');

//,'middleware'=>'adminLogin'
Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {
    Route::group(['prefix' => 'the-loai'], function () {
        
        Route::get('danh-sach', 'TheloaiController@getDanhSach');
        Route::get('sua/{id}', 'TheloaiController@getSua');
        Route::get('them', 'TheloaiController@getThem');
        Route::post('them', 'TheloaiController@postThem'); 
        Route::post('cap-nhat/{id}','TheloaiController@postCapNhat');  
        Route::get('xoa/{id}','TheloaiController@getXoa');
    });

    Route::group(['prefix' => 'loai-tin'], function () {
        
        Route::get('danh-sach', 'LoaiTinController@getDanhSach');
        Route::get('them', 'LoaiTinController@getThem');
        Route::post('them', 'LoaiTinController@postThem');
        Route::get('sua/{id}', 'LoaiTinController@getSua'); 
        Route::post('sua/{id}', 'LoaiTinController@postSua');
        Route::get('xoa/{id}', 'LoaiTinController@getXoa');
        
    });

    Route::group(['prefix' => 'tin-tuc'], function () {
        
        Route::get('danh-sach', 'TinTucController@getDanhSach');
        Route::get('them', 'TinTucController@getThem');
        Route::post('them', 'TinTucController@postThem' );
        Route::get('sua/{id}', 'TinTucController@getSua'); 
        Route::post('sua/{id}', 'TinTucController@postSua');
        Route::get('xoa/{id}', 'TinTucController@getXoa');
        
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('danh-sach', 'SlideController@getDanhSach');
        Route::get('xoa/{id}', 'SlideController@getXoa');
        Route::get('them', 'SlideController@getThem');
        Route::post('them','SlideController@postThem'); 
        Route::get('sua/{id}', 'SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');
        
        
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/danh-sach', 'UserController@getDanhSach'); 
        Route::get('/them', 'UserController@getThem'); 
        Route::post('/them', 'UserController@postThem');
        Route::get('/sua/{id}', 'UserController@getSua');  
        Route::post('/sua/{id}', 'UserController@postSua');
        Route::get('/xoa/{id}', 'UserController@getXoa');       
    });
    
    
    Route::get('binh-luan/xoa/{id}/{idTinTuc}', 'CommentController@getXoa');

});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/tin-tuc/ajax/loai-tin/{idTheLoai}', 'AjaxController@getLoaiTin');
    Route::get('/tin-tuc/sua/ajax/loai-tin/{idTheLoai}', 'AjaxController@getLoaiTin');
});
Route::get('/trang-chu', 'PageController@trangchu');
Route::get('/lien-he', 'PageController@LienHe');
Route::get('/loai-tin/{id}/{TenKhongDau}.html', 'PageController@LoaiTin');
Route::get('/tin-tuc/{id}/{TieuDeKhongDau}.html', 'PageController@TinTuc');
Route::get('/dang-nhap', 'PageController@getDangNhap');
Route::post('/dang-nhap', 'PageController@postDangNhap');
Route::get('/dang-xuat', 'PageController@getDangXuat');
Route::post('/tin-tuc/{id}/comment', 'CommentController@postComment');
Route::get('/nguoi-dung', 'PageController@getNguoiDung');
Route::post('/nguoi-dung', 'PageController@postNguoiDung');
Route::get('/dang-ky', 'PageController@getDangKy');
Route::get('/gioi-thieu', 'PageController@getGioiThieu');
Route::post('/dang-ky', 'PageController@postDangKy');


Route::post('/tim-kiem', 'PageController@postTimKiem');
