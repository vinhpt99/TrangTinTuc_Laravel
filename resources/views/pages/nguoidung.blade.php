@extends('layout.index')
@section('content')
<div class="container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                  <div class="panel-heading">Thông tin tài khoản</div>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as  $error)
                      <li>{{$error}}</li>     
                      @endforeach
                  </ul>
                  </div>      
                  @endif
                  <div class="panel-body">
                    <form action="" method="post">
                        @csrf
                        <div>
                            <label>Họ tên</label>
                              <input type="text" value="{{$user->name}}" class="form-control" placeholder="Username" name="txtName" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                              <input type="email" value="{{$user->email}}" class="form-control" placeholder="Email" name="txtEmail" aria-describedby="basic-addon1"
                              disabled
                              >
                        </div>
                        <br>	
                        <div>
                            <input name="checkPassword" type="checkbox" id="checkchangepass">
                            <label>Đổi mật khẩu</label>
                              <input type="password" disabled class="form-control password" name="txtPassword" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                              <input type="password" disabled class="form-control password" name="txtpasswordAgain" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Sửa
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