<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Thể loại<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/the-loai/danh-sach')}}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{url('admin/the-loai/them')}}">Thêm thể loại</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Loại tin<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/loai-tin/danh-sach')}}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{url('admin/loai-tin/them')}}">Thêm loại tin</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Tin tức<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/tin-tuc/danh-sach')}}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{url('admin/tin-tuc/them')}}">Thêm tin tức</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Slide<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/slide/danh-sach')}}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{url('admin/slide/them')}}">Thêm Slide</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/user/danh-sach')}}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{url('admin/user/them')}}">Thêm</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>