<?php

namespace App\Http\Controllers;
use App\TinTuc;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    //
    public function postComment(Request $request, $id)
    {   
        $valiDateData = $request->validate(
            [
              'txtNoiDung' => 'required',
             
            ],
            [
               'txtNoiDung.required'=>'Bạn chưa nhập nội dung bình luận',
              
            ]);
        $idTinTuc = $id;
        $tintuc = TinTuc::findOrFail($id);
        $comment = new Comment;
        $comment->idTinTuc = $idTinTuc;
        $comment->idNguoiDung = Auth::user()->id;
        $comment->NoiDung = $request->txtNoiDung;
        $comment->save();
        return redirect("tin-tuc/$id/$tintuc->TieuDeKhongDau.html")->with('status','Bình luận đã được đăng');
        

    }
    public function getXoa($id, $idTinTuc)
    {
        
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect("/admin/tin-tuc/sua/$idTinTuc")->with('status', 'Bạn đã xóa thành công bình luận');
    }
}
