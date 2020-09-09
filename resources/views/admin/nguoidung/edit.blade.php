@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as  $error)
              <li>{{$error}}</li>     
            @endforeach
          </ul>
        </div>      
        @endif
        @if (session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$nguoidung->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-10" style="padding-bottom:120px">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input value="{{$nguoidung->name}}" class="form-control" name="txtHoTen" placeholder="Nhập tên người dùng"/>      
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input value="{{$nguoidung->email}}" readonly="" type="email" class="form-control" name="txtEmail" placeholder="Nhập địa chỉ email" />
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" id="checkchangepass"  name="changepassword"/>
                        <label>Thay đổi mật khẩu</label> 
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control password" name="txtpassword" placeholder="Nhập mật khẩu" disabled=""/>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input type="password" class="form-control password" name="txtpasswordagain" placeholder="Nhập lại mật khẩu"  disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Quyền người dùng: </label>
                        <label class="radio-inline">
                            <input name="quyen" 
                            @if($nguoidung->quyen == 1)
                            {{"checked"}}
                            @endif
                            value="1"  type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" 
                            @if($nguoidung->quyen == 2)
                            {{"checked"}}
                            @endif
                              value="2" type="radio">Thường
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>  
<!-- /#page-wrapper -->
@endsection
@section('script')
 <script>
     $(document).ready(function()
     {
       $('#checkchangepass').change(function(){
           if($(this).is(":checked"))
           {
               $('.password').removeAttr('disabled');
           }
           else
           {
            $('.password').attr('disabled','');
           }
       });
     });
 </script>
@endsection
