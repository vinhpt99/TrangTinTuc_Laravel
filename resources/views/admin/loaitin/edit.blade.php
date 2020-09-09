@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
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
                <h1 class="page-header">Loại tin
                    <small>{{$loaitin->Ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select name="TheLoai" class="form-control">
                            @foreach ($theloai as $tl)
                              <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại tin</label>
                        <input class="form-control" value="{{$loaitin->Ten}}" name="txtTenLoaiTin" placeholder="Nhập tên của loại tin" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa thể loại</button>
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

