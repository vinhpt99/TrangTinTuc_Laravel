<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comment";
    public function tintuc()
    {
        return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }
    public function nguoidung()
    {
        return $this->belongsTo('App\User', 'idNguoiDung', 'id');
    }
}
