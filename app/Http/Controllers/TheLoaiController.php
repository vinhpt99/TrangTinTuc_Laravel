<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {   
        $theloai = TheLoai::all();
        $data = [];
        $data["theloai"] = $theloai;
        //tên biến truyền sang là theloai nhận dữ liệu từ $theloai
        return view('admin.theloai.index', $data);
    }
    public function getThem()
    {
      return view('admin.theloai.create');
    }
    public function getSua($id)
    {   
        $tl = TheLoai::findOrFail($id);
        $data = [];
        $data['tl'] = $tl;
        return view('admin.theloai.edit', $data);
    }
    public function postThem(Request $request)
    {  
      $valiDateData = $request->validate(
        [
          'txtTenTheLoai' => 'required|min:3|max:100',
        ],
        [
           'txtTenTheLoai.required'=>'Bạn chưa nhập tên thể loại',
           'txtTenTheLoai.min'=>'Tên thể loại quá ngắn, độ dài 3 - 100 kí tự',
           'txtTenTheLoai.max'=>'Tên thể loại quá dài, độ dài 3 - 100 kí tự'
        ]);
      
      $theloai = new TheLoai();
      $theloai->Ten = $request->txtTenTheLoai;
      $theloai->TenKhongDau =  changeTitle($request->txtTenTheLoai);
      $theloai->save();
      return redirect('admin/the-loai/them')->with('status','Thêm thể loại mới thành công');

    }
    public function postCapNhat(Request $request, $id)
    { 
      $valiDateData = $request->validate(
        [
          'txtTenTheLoai' => 'required|unique:TheLoai,Ten',
        ],
        [
           'txtTenTheLoai.required'=>'Bạn chưa nhập tên thể loại',
           'txtTenTheLoai.unique'=>'Tên thể loại đang trùng'
        ]);
      $tenTheLoai = $request->input('txtTenTheLoai','');
      $tl = TheLoai::findOrFail($id);
      $tl->Ten = $tenTheLoai;
      $tl->TenKhongDau = changeTitle($request->txtTenTheLoai);
      $tl->save();
      return redirect("/admin/the-loai/sua/$id")->with('status','Cập nhật thể loại thành công !');

    }
    public function getXoa($id)
    {
      $tl = TheLoai::findOrFail($id);
      $tl->delete();
      return redirect("/admin/the-loai/danh-sach")->with('status', 'Bạn đã xóa thành công thể loại');
    }
}
