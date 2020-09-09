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
                <h1 class="page-header">Thể loại
                    <small>{{$tl->Ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{url("/admin/the-loai/cap-nhat/$tl->id")}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input value="{{$tl->Ten}}" class="form-control" name="txtTenTheLoai" placeholder="Điền tên thể loại bạn muốn sửa !" />
                    </div>
               
                    <button type="submit" class="btn btn-warning">Sửa</button>
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

