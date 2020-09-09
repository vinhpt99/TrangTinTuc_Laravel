<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url("trang-chu")}}">Trang Tin Tức</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{url("gioi-thieu")}}">Giới thiệu</a>
                </li>
                <li>
                    <a href="{{url("lien-he")}}">Liên hệ</a>
                </li>
            </ul>

            <form action="{{url("tim-kiem")}}" method="post" class="navbar-form navbar-left" role="search">
                @csrf
                <div class="form-group">
                  <input type="text" 
                  @if (isset($key_search))
                    value="{{$key_search}}" 
                  @endif class="form-control" name="key_search" placeholder="Tìm kiếm tin tức...">
                </div>
                <button type="submit" class="btn btn-default">Tìm kiếm</button>
            </form>
            <ul class="nav navbar-nav pull-right">
                @if (isset(Auth::user()->id))
                    <li>
                        <a href="nguoi-dung">
                            <span class ="glyphicon glyphicon-user"></span>
                            {{Auth::user()->name}}
                        </a>
                    </li>
                @endif
                    <li>
                        <a href="dang-ky">Đăng ký</a>
                    </li>
                    <li>
                        <a href="dang-nhap">Đăng nhập</a>
                    </li>
                    <li>
                        <a href="{{url("dang-xuat")}}">Đăng xuất</a>
                    </li>        
            </ul>
        </div>


        
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
