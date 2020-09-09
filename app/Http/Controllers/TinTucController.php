<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use App\Comment;
use Doctrine\DBAL\Driver\SQLSrv\LastInsertId;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
        $tintuc = TinTuc::orderBy('id','DESC')->get();
        $data = [];
        $data['tintuc'] = $tintuc;
        // echo "<pre>";
        // echo $tintuc;
        // echo "</pre>";
        return view("admin.tintuc.index", $data);
    }
    public function getSua($id)
    {   
        
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        $tintuc = TinTuc::findOrFail($id);
        $data = [];
        $data['loaitin'] = $loaitin;
        $data['theloai'] = $theloai;
        $data['tintuc'] = $tintuc;
        return view('admin.tintuc.edit', $data);
    }
    public function postSua(Request $request, $id)
    {
        $tintuc = TinTuc::findOrFail($id);
        $valiDateData = $request->validate(
            [
              'TheLoai' =>'required',
              'LoaiTin' =>'required',
              'txtTieuDe' => 'required|min:3|max:100',
              'txtTomTat'=>'required',
              'txtNoiDung' => 'required',


            ],
            [  
               'TheLoai.required' => 'Bạn chưa chọn thể loại',
               'LoaiTin.required' => 'Bạn chưa chọn loại tin',
               'txtTieuDe.required'=>'Bạn chưa nhập tên thể loại',
               'txtTieuDe.min'=>'Tên thể loại quá ngắn, độ dài 3 - 100 kí tự',
               'txtTieuDe.max'=>'Tên thể loại quá dài, độ dài 3 - 100 kí tự',
               'txtTomTat.required'=>'Bạn chưa nhập tóm tắt',
               'txtNoiDung.required'=>'Bạn chưa nhập nội dung'
            ]);
            $tintuc->TieuDe = $request->txtTieuDe;
            $tintuc->TieuDeKhongDau = changeTitle($request->txtTieuDe);
            $tintuc->idLoaiTin = $request->LoaiTin;
            $tintuc->TomTat = $request->txtTomTat;
            $tintuc->NoiDung = $request->txtNoiDung;
            // $tintuc->SoLuotXem = 0;
            $tintuc->NoiBat = $request->radioNoiBat;
            if($request->hasFile('HinhAnh'))
            {
                $file = $request->file('HinhAnh');
                //lấy ra định dạng ảnh
                $dinhdang = $file->getClientOriginalExtension();
                if($dinhdang != 'jpg' && $dinhdang != 'png' && $dinhdang != 'jpeg')
                {
                    return redirect('admin/tin-tuc/them');
                }
                //lấy tên hình ảnh ra
                $name = $file->getClientOriginalName();
                //trường hợp tên hình ảnh bọ trùng
                $hinhanh = Str::random(4)."_".$name;
                //kiểm tra tồn tại của file
                while(file_exists("upload/tintuc".$hinhanh))
                {
                    $hinhanh = Str::random(4)."_".$name;
                    
                }
                //lưu hình ảnh
                $file->move("upload/tintuc", $hinhanh);
                //Xóa hình
                unlink("upload/tintuc/".$tintuc->Hinh);
                $tintuc->Hinh = $hinhanh;
            }
            $tintuc->save();
            return redirect("admin/tin-tuc/sua/$id")->with('status','Sửa thành công tin tức !');

    }
    public function getThem()
    {   
        $theloai = TheLoai::all();
        $data = [];
        $data["theloai"] = $theloai;
       
        $loaitin = LoaiTin::all();
        $data1 = [];
        $data1["loaitin"] = $loaitin;

        return view("admin.tintuc.create", $data, $data1);
    }
    public function postThem(Request $request)
    {
        $valiDateData = $request->validate(
            [
              'TheLoai' =>'required',
              'LoaiTin' =>'required',
              'txtTieuDe' => 'required|min:3|max:100',
              'txtTomTat'=>'required',
              'txtNoiDung' => 'required',


            ],
            [  
               'TheLoai.required' => 'Bạn chưa chọn thể loại',
               'LoaiTin.required' => 'Bạn chưa chọn loại tin',
               'txtTieuDe.required'=>'Bạn chưa nhập tên thể loại',
               'txtTieuDe.min'=>'Tên thể loại quá ngắn, độ dài 3 - 100 kí tự',
               'txtTieuDe.max'=>'Tên thể loại quá dài, độ dài 3 - 100 kí tự',
               'txtTomTat.required'=>'Bạn chưa nhập tóm tắt',
               'txtNoiDung.required'=>'Bạn chưa nhập nội dung'
            ]);
            $tintuc = new TinTuc;
            $tintuc->TieuDe = $request->txtTieuDe;
            $tintuc->TieuDeKhongDau = changeTitle($request->txtTieuDe);
            $tintuc->idLoaiTin = $request->LoaiTin;
            $tintuc->TomTat = $request->txtTomTat;
            $tintuc->NoiDung = $request->txtNoiDung;
            $tintuc->SoLuotXem = 0;
            $tintuc->NoiBat = $request->radioNoiBat;
            //kiểm tra người dùng có gửi lên file hình ảnh
            if($request->hasFile('HinhAnh'))
            {
                $file = $request->file('HinhAnh');
                //lấy ra định dạng ảnh
                $dinhdang = $file->getClientOriginalExtension();
                if($dinhdang != 'jpg' && $dinhdang != 'png' && $dinhdang != 'jpeg')
                {
                    return redirect('admin/tin-tuc/them');
                }
                //lấy tên hình ảnh ra
                $name = $file->getClientOriginalName();
                //trường hợp tên hình ảnh bọ trùng
                $hinhanh = Str::random(4)."_".$name;
                //kiểm tra tồn tại của file
                while(file_exists("upload/tintuc".$hinhanh))
                {
                    $hinhanh = Str::random(4)."_".$name;
                    
                }
                //lưu hình ảnh
                $file->move("upload/tintuc", $hinhanh);
                $tintuc->Hinh = $hinhanh;
                

            }
            else
            {
                $tintuc->Hinh = "";
            }
            $tintuc->save();
            return redirect('admin/tin-tuc/them')->with('status','Thêm tin tức thành công');
    }
    public function getXoa($id)
    {
        $tintuc = TinTuc::findOrFail($id);
        $tintuc->delete();
        return redirect('admin/tin-tuc/danh-sach')->with('status','Xoá thành công');
    }
}
