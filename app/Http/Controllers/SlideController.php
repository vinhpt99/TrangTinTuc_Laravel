<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhSach()
    {
         $slide = Slide::all();
         $data = [];
         $data['slide'] = $slide;
         return view('admin.slide.index', $data);

    }
    public function getSua($id)
    {
        $slide = Slide::findOrFail($id);
        $data = [];
        $data['slide'] = $slide;
        return view('admin.slide.edit', $data);

    }
    public function postSua(Request $request, $id)
    {   
        $valiDateData = $request->validate(
            [
              'txtTenSlide' =>'required',
              'txtNoiDungSlide' =>'required',
            ],
            [  
               'txtTenSlide.required'=>'Bạn chưa nhập tên',
               'txtNoiDungSlide.required'=>'Bạn chưa nhập nội dung'
            ]);
            //khởi tạo đối tượng slide
            $slide = Slide::findOrFail($id);
            $slide->Ten = $request->txtTenSlide;
            $slide->NoiDung = $request->txtNoiDungSlide;
            if($request->has('txtLink'))
            $slide->Link = $request->txtLink;
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
                //trường hợp tên hình ảnh bị trùng
                $hinhanh = Str::random(4)."_".$name;
                //kiểm tra tồn tại của file
                while(file_exists("upload/slide".$hinhanh))
                {
                    $hinhanh = Str::random(4)."_".$name;
                    
                }
                //lưu hình ảnh
                $file->move("upload/slide", $hinhanh);
                  //Xóa hình cũ
                unlink("upload/slide/$slide->Hinh");
                $slide->Hinh = $hinhanh;
                

            }
           $slide->save();
           return redirect("admin/slide/sua/$id")->with('status','Sửa thành công');
        
    }
    public function getXoa($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect('admin/slide/danh-sach')->with('status','Xoá thành công');

    }
    public function getThem()
    {
        return view('admin.slide.create');
    }
    public function postThem(Request $request)
    {
        $valiDateData = $request->validate(
            [
              'txtTenSlide' =>'required',
              'txtNoiDungSlide' =>'required',
            ],
            [  
               'txtTenSlide.required'=>'Bạn chưa nhập tên',
               'txtNoiDungSlide.required'=>'Bạn chưa nhập nội dung'
            ]);
            //khởi tạo đối tượng slide
            $slide = new Slide;
            $slide->Ten = $request->txtTenSlide;
            $slide->NoiDung = $request->txtNoiDungSlide;
            if($request->has('txtLink'))
            $slide->Link = $request->txtLink;
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
                //trường hợp tên hình ảnh bị trùng
                $hinhanh = Str::random(4)."_".$name;
                //kiểm tra tồn tại của file
                while(file_exists("upload/slide".$hinhanh))
                {
                    $hinhanh = Str::random(4)."_".$name;
                    
                }
                //lưu hình ảnh
                $file->move("upload/slide", $hinhanh);
                $slide->Hinh = $hinhanh;
                

            }
            else
            {
                $slide->Hinh = "";
            }

            $slide->save();
            return redirect('admin/slide/them')->with('status','Thêm thành công');


    }
}
