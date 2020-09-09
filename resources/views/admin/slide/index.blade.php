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
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Nội dung</th>
                        <th>Hình</th>
                        <th>Link</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($slide as $slide)
                        <tr class="even gradeC" align="center">
                            <td>{{$slide->id}}</td>
                            <td>{{$slide->Ten}}</td>
                            <td>{!!$slide->NoiDung!!}</td>
                            <td>
                                <img width="100px" src="{{asset("upload/slide/$slide->Hinh")}}" alt="fgdg">
                            </td>
                            <td>{{$slide->Link}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{url("/admin/slide/xoa/$slide->id")}}">Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{url("/admin/slide/sua/$slide->id")}}">Sửa</a></td>
                        </tr>                    
                        @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

