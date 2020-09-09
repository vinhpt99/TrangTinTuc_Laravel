<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    function __construct()
    {   
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai', $theloai);
        view()->share('slide', $slide);
        // if(Auth::check())
        // {
        //     view()->share(Auth::user());
            
        // }
        
    }
    public function getGioiThieu()
    {
        return view('pages.gioithieu');
    }
    public function postTimKiem(Request $request)
    {  
       $data = [];
       $key_search = $request->key_search;
       $tintuc = TinTuc::where('TieuDe',"like","%".$key_search."%")->orWhere('TomTat','like',"%".$key_search."%")->orWhere('NoiDung','like',"%".$key_search."%")->take(30)->paginate(5);
       $data["key_search"] =  $key_search;
       $data["tintuc"] = $tintuc;
       return view('pages.timkiem', $data);
       
    }
    public function postDangKy(Request $request)
    {
        $valiDateData = $request->validate(
            [
              'txtTen' =>'required|min:3',
              'txtEmail' =>'required|email|unique:users,email',
              'txtpassword' => 'required|min:3|max:32',
              'txtpasswordagain'=>'required|same:txtpassword',
            ],
            [  
               'txtTen.required' => 'Bạn chưa nhập tên người dùng',
               'txtTen.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
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
        $user->name = $request->txtTen;
        $user->email= $request->txtEmail;
        $user->password = Hash::make($request->txtpassword);
        $user->quyen = 0;
        $user->save();
        return redirect('admin/dang-nhap')->with('status','Đăng kí thành công tài khoản');
    }
    public function getDangKy()
    {
        return view('pages.dangky');
    }
    public function postNguoiDung(Request $request)
    {
           $valiDateData = $request->validate(
            [
              'txtName' =>'required|min:3',
            ],
            [  
               'txtName.required' => 'Bạn chưa nhập tên người dùng',
               'txtName.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
           
            ]);

        $user = Auth::user();  
        $user->name = $request->txtName;
        if($request->checkPassword == "on")
        {    
            $valiDateData = $request->validate(
                [
                  'txtPassword' => 'required|min:3|max:32',
                  'txtpasswordAgain'=>'required|same:txtPassword',
                ],
                [  
                   'txtPassword.required'  => 'Bạn chưa nhập mật khẩu',
                   'txtPassword.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
                   'txtPassword.max' => 'Mật khẩu phải có ít hơn 32 kí tự',
                   'txtpasswordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                   'txtpasswordAgain.same' => 'Mật khẩu nhập lại chưa khớp',
                ]);
            $user->password = Hash::make($request->txtPassword);
        }
        $user->save();
        return redirect("dang-xuat")->with('status','Sửa thành công thông tin User');

    }
    public function getNguoiDung()
    {   
        $data = [];
        $user = Auth::user();
        $data['user'] =  $user;
        return view('pages.nguoidung', $data);
    }
    public function getDangXuat()
    {  
        Auth::logout();
        return redirect('trang-chu');
    }
    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }
    public function postDangNhap(Request $request)
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
        // $nguoidung = User::all();
        if(Auth::attempt(['email' => $request->txtEmail, 'password' =>  $request->txtPassword ]))
        {
           return redirect("trang-chu");

        }
        else
        {
            return redirect("dang-nhap")->with('status','Đăng nhập không thành công !');

        }
    }
    public function TinTuc($id)
    {
        $tintuc =TinTuc::findOrFail($id);
        $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        $data = [];
        $data['tintuc'] =   $tintuc;
        $data['tinnoibat'] = $tinnoibat;
        $data['tinlienquan'] = $tinlienquan;
        return view('pages.tintuc', $data);
    }
    public function LoaiTin($id)
    {   
        $data = [];
        $loaitin =LoaiTin::findOrFail($id);
        $data['loaitin'] =   $loaitin;
        $tintuc =TinTuc::where('idLoaiTin', $id)->paginate(5);
        $data['tintuc'] =   $tintuc;
        return view('pages.loaitin', $data);
    }
    public function trangchu()
    {
      
       return view('pages.trangchu');
    }
    public function LienHe()
    {   
        // $theloai = TheLoai::all();
        // $data = [];
        // $data['theloai'] =  $theloai;
        return view('pages.lienhe');
    }
}
