<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    
    protected $table = "theloai";
    //fuction lấy ra tất cả loại tin của một thể loại
    public function loaitin()
    {  
        //model-khóa phụ bảng loại tin-khóa chinh
        return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }
    //function tin tuc
    public function tintuc()
    {
        return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
