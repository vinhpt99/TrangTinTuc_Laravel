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
                <h1 class="page-header">Tin Tức
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select value="{{old('TheLoai',"")}}" name="TheLoai" id="TheLoai" class="form-control">
                            @foreach ($theloai as $tl)
                               <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select value="{{old('LoaiTin',"")}}" name="LoaiTin" id="LoaiTin" class="form-control">
                            @foreach ($loaitin as $lt)
                              <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input value="{{old('txtTieuDe',"")}}" class="form-control" name="txtTieuDe" placeholder="Nhập tiêu đề"/>
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea name="txtTomTat" id="demo" rows="3" class="form-control ckeditor">{{old('txtTomTat',"")}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="txtNoiDung" id="demo" class="form-control ckeditor">{{old('txtNoiDung',"")}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input value="{{old('HinhAnh',"")}}"  type="file" name="HinhAnh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nổi bật: </label>
                        <label class="radio-inline">
                            <input name="radioNoiBat" value="0" checked="" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="radioNoiBat" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm tin tức</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>  
@endsection
@section('script')
    <script> 
       //ajax
      //bắt sự kiện giá trị trong ô input thay đổi
      $(document).ready(function(){
           $('#TheLoai').change(function(){
             var idTheLoai = $(this).val();
             //console.log(idTheLoai);
             $.get("ajax/loai-tin/"+idTheLoai,function(data){
              //khi lấy dữ liệu về dữ liệu sẽ được trả về trong fuction data
              //thay đổi dữ liệu trong loại tin bằng dữ liệu mới
              //console.log(data);
              $('#LoaiTin').html(data);
              });
          });  
      });
    </script>
@endsection
