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
                <h1 class="page-header">Slide
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-10" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="txtTenSlide" placeholder="Nhập tên Slide" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="txtNoiDungSlide" id="demo" rows="3" class="form-control ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="txtLink" placeholder="Nhập Link" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="HinhAnh" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Thêm slide</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>  
@endsection
