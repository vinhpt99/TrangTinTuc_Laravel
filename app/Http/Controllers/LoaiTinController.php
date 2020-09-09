<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        $data = [];
        $data["loaitin"] = $loaitin;
        return view('admin.loaitin.index', $data);


    }
    public function getThem()
    {   
        $theloai = TheLoai::all();
        $data = [];
        $data["theloai"] = $theloai;
        return view('admin.loaitin.create', $data);
    }
    public function postThem(Request $request)
    {   
        $valiDateData = $request->validate(
            [
              'txtTenLoaiTin' => 'required|min:3|max:100',
             
            ],
            [
               'txtTenLoaiTin.required'=>'Bạn chưa nhập tên loại tin',
               'txtTenLoaiTin.min'=>'Tên loại tin quá ngắn, độ dài 3 - 100 kí tự',
               'txtTenLoaiTin.max'=>'Tên loại tin quá dài, độ dài 3 - 100 kí tự'
            ]);
            $loaitin = new LoaiTin();
            $loaitin->Ten = $request->txtTenLoaiTin;
            $loaitin->TenKhongDau = changeTitle($request->txtTenLoaiTin);
            $loaitin->idTheLoai = $request->TheLoai;
            $loaitin->save();
            return redirect('admin/loai-tin/them')->with('status','Thêm loại tin mới thành công');
        
    }
    public function getSua($id)
    {
        $lt = LoaiTin::findOrFail($id);
        $data = [];
        $data['loaitin'] = $lt;
        $theloai = TheLoai::all();
        $data1 = [];
        $data1['theloai'] = $theloai;
        return view('admin.loaitin.edit', $data, $data1);
          // echo "<pre>";
         // echo $lt;
        // echo "</pre>";

    }
    public function postSua(Request $request, $id)
    {
        $valiDateData = $request->validate(
            [
              'txtTenLoaiTin' => 'required|unique:LoaiTin,Ten|min:3|max:100',
            ],
            [
               'txtTenLoaiTin.required'=>'Bạn chưa nhập tên loại tin',
               'txtTenLoaiTin.unique'=>'Tên loại tin đang trùng',
               'txtTenLoaiTin.min'=>'Tên loại tin quá ngắn, độ dài 3 - 100 kí tự',
               'txtTenLoaiTin.max'=>'Tên loại tin quá dài, độ dài 3 - 100 kí tự'
            ]);
        $tenLoaiTin = $request->input('txtTenLoaiTin','');
        $lt = LoaiTin::findOrFail($id);
        $lt->idTheLoai = $request->TheLoai;
        $lt->Ten = $tenLoaiTin;
        $lt->TenKhongDau = changeTitle($request->txtTenLoaiTin);
        $lt->save();
        return redirect("admin/loai-tin/sua/$id")->with('status','Sửa thể loại mới thành công');  
    }
    public function getXoa($id)
    {
        $lt = LoaiTin::findOrFail($id);
        $lt->delete();
        return redirect("/admin/loai-tin/danh-sach")->with('status', 'Bạn đã xóa thành công thể loại');
    }
    public function getLoaiTin($idTheLoai)
    {
        $loaitin = LoaiTin::where('idTheLoai', $idTheLoai)->get();

    }
}
