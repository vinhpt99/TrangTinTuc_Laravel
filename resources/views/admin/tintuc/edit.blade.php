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
                <h1 class="page-header">Tin Tức
                    <small>{{$tintuc->TieuDe}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select name="TheLoai" id="TheLoai" class="form-control">
                            @foreach ($theloai as $tl)
                               <option 
                               @if ($tintuc->loaitin->theloai->id == $tl->id)
                               {{"selected"}}          
                               @endif
                               value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select name="LoaiTin" id="LoaiTin" class="form-control">
                            @foreach ($loaitin as $lt)
                              <option
                              @if($tintuc->loaitin->id == $lt->id)
                              {{"selected"}}          
                              @endif
                              value="{{$lt->id}}">{{$lt->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input value="{{$tintuc->TieuDe}}" class="form-control" name="txtTieuDe" placeholder="Please Enter Category Order" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea name="txtTomTat" id="demo" rows="3" class="form-control ckeditor">{{$tintuc->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="txtNoiDung" id="demo" class="form-control ckeditor">{{$tintuc->NoiDung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="HinhAnh" class="form-control">
                        <img style="width:150px; height:100px" src="{{asset("upload/tintuc/$tintuc->Hinh")}}" alt="">
                    </div>
                    <div class="form-group">
                        <label>Nổi bật: </label>
                        <label class="radio-inline">
                            <input name="radioNoiBat"
                             @if ($tintuc->NoiBat == 0)
                                 {{"checked"}}
                             @endif
                             value="0" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input
                            @if ($tintuc->NoiBat == 1)
                            {{"checked"}}
                            @endif
                             name="radioNoiBat" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
                    <h1 class="page-header">Bình luận
                        <small>Danh sách</small>
                    </h1>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tintuc->comment as $cm)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$cm->id}}</td>
                                    <td>{{$cm->nguoidung->name}}</td>
                                    <td>{{$cm->NoiDung}}</td>
                                    <td>{{$cm->created_at}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{url("admin/binh-luan/xoa/{$cm->id}/{$tintuc->id}")}}">Xóa</a></td>
                                </tr>  
                            @endforeach   
                        </tbody>
                    </table>

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
