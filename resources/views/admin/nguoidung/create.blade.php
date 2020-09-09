@extends('admin.layout.index')
@section('content')
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
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-10" style="padding-bottom:120px">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="txtHoTen" placeholder="Nhập tên người dùng"/>      
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" placeholder="Nhập địa chỉ email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtpassword" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input type="password" class="form-control" name="txtpasswordagain" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Quyền người dùng: </label>
                        <label class="radio-inline">
                            <input name="quyen" value="1"  type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="quyen" checked=""  value="2" type="radio">Thường
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>  
@endsection
