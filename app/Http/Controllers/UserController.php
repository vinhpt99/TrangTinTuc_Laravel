<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Else_;

class UserController extends Controller
{
    
   
    public function getDangXuatAdmin()
    { 
        Auth::logout();
        return redirect("admin/dang-nhap")->with('status','Đăng nhập không thành công');

    }
    public function getDangNhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangNhapAdmin(Request $request)
    {   
        $valiDateData = $request->validate(
            [
              'txtEmail' => 'required',
              'txtPassword'=>'required||min:3|max:32',
            ],
            [  
               'txtEmail.required'  => 'Bạn chưa nhập email',
               'txtPassword.required' => 'Bạn chưa nhập mật khẩu',
               'txtPassword.max' => 'Mật khẩu phải có ít hơn 32 kí tự',
               'txtPassword.min' => 'Mật khẩu phải có nhiều hơn 3 kí tự',
              
            ]);
        $nguoidung = User::all();
        if(Auth::attempt(['email' => $request->txtEmail, 'password' =>  $request->txtPassword ]))
        {
           return redirect("admin/tin-tuc/danh-sach");

        }
        else
        {
            return redirect("admin/dang-nhap")->with('status','Đăng nhập thất bại !');

        }
    }
    public function getXoa($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/user/danh-sach')->with('status','Xoá thành công');
    }
    public function getDanhSach()
    {
        $nguoidung = User::all();
        $data = [];
        $data['nguoidung'] = $nguoidung;
        return view('admin.nguoidung.index', $data);
    }
    public function getSua($id)
    {  
        $nguoidung = User::findOrFail($id);
        $data = [];
        $data['nguoidung'] = $nguoidung;
        return view('admin.nguoidung.edit', $data);

    }
    public function postSua(Request $request, $id)
    {  
        $valiDateData = $request->validate(
            [
              'txtHoTen' =>'required|min:3',
            ],
            [  
               'txtHoTen.required' => 'Bạn chưa nhập tên người dùng',
               'txtHoTen.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
           
            ]);

        $user = User::findOrFail($id);
        $user->name = $request->txtHoTen;
        $user->quyen = $request->quyen;
        if($request->changepassword == "on")
        {    
            $valiDateData = $request->validate(
                [
                  'txtpassword' => 'required|min:3|max:32',
                  'txtpasswordagain'=>'required|same:txtpassword',
                ],
                [  
                   'txtpassword.required'  => 'Bạn chưa nhập mật khẩu',
                   'txtpassword.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
                   'txtpassword.max' => 'Mật khẩu phải có ít hơn 32 kí tự',
                   'txtpasswordagain.required' => 'Bạn chưa nhập lại mật khẩu',
                   'txtpasswordagain.same' => 'Mật khẩu nhập lại chưa khớp',
                ]);
            $user->password = Hash::make($request->txtpassword);
        }
        $user->save();
        return redirect("admin/user/sua/$id")->with('status','Sửa thành công thông tin User');

    }
    public function getThem()
    {
        return view('admin.nguoidung.create');
    }
    public function postThem(Request $request)
    {
        $valiDateData = $request->validate(
            [
              'txtHoTen' =>'required|min:3',
              'txtEmail' =>'required|email|unique:users,email',
              'txtpassword' => 'required|min:3|max:32',
              'txtpasswordagain'=>'required|same:txtpassword',
            ],
            [  
               'txtHoTen.required' => 'Bạn chưa nhập tên người dùng',
               'txtHoTen.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
               'txtEmail.required' => 'Bạn chưa nhập địa chỉ email',
               'txtEmail.email' => 'Định dạng email bạn nhập chưa đúng',
               'txtEmail.unique' => 'Email của bạn nhập đã tồn tại',
               'txtpassword.required'  => 'Bạn chưa nhập mật khẩu',
               'txtpassword.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
               'txtpassword.max' => 'Mật khẩu phải có ít hơn 32 kí tự',
               'txtpasswordagain.required' => 'Bạn chưa nhập lại mật khẩu',
               'txtpasswordagain.same' => 'Mật khẩu nhập lại chưa khớp',
            ]);

        $user = new User();
        $user->name = $request->txtHoTen;
        $user->email= $request->txtEmail;
        $user->password = Hash::make($request->txtpassword);
        $user->quyen = $request->quyen;
        $user->save();
        return redirect('admin/user/them')->with('status','Thêm thành công user');
    }
}
