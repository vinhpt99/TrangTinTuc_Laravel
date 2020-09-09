@extends('layout.index')
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                  <div class="panel-heading">Đăng ký tài khoản</div>
                  <div class="panel-body">
                    <form action="" method="post">
                       @csrf
                        <div>
                            <label>Họ tên</label>
                              <input type="text" class="form-control" placeholder="Username" name="txtTen" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                              <input type="email" class="form-control" placeholder="Email" name="txtEmail" aria-describedby="basic-addon1"
                              >
                        </div>
                        <br>	
                        <div>
                            <label>Nhập mật khẩu</label>
                              <input type="password" class="form-control" name="txtpassword" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                              <input type="password" class="form-control" name="txtpasswordagain" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Đăng ký
                        </button>
                    </form>
                  </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->

@endsection