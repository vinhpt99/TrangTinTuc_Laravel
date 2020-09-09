@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nguoidung as $nguoidung)
                    <tr class="odd gradeX" align="center">
                        <td>{{$nguoidung->id}}</td>
                        <td>{{$nguoidung->name}}</td>
                        <td>{{$nguoidung->email}}</td>
                        <td>
                            @if ($nguoidung->quyen == 1)
                            {{"Admin"}}
                            @else   
                            {{"Thường"}}  
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{url("/admin/user/xoa/$nguoidung->id")}}">Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{url("/admin/user/sua/$nguoidung->id")}}">Sửa</a></td>
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

