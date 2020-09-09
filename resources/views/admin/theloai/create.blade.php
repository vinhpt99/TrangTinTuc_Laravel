@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        @if (session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as  $error)
              <li>{{$error}}</li>     
            @endforeach
          </ul>
        </div>      
        @endif
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="txtTenTheLoai" placeholder="Nhập tên thể loại" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm thể loại</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>  
@endsection
