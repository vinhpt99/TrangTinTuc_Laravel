@extends('layout.index')
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$tintuc->TieuDe}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">Admin</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{asset("upload/tintuc/$tintuc->Hinh")}}" alt="hhh">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on: {{$tintuc->created_at}}</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">
                {!!$tintuc->NoiDung!!}
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
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
                @if (isset(Auth::user()->id))
                    <form action="comment" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="txtNoiDung" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                @endif
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            @foreach ($tintuc->comment as $cm)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$cm->nguoidung->name}}
                        <small>{{$cm->created_at}}</small>
                    </h4>
                {{$cm->NoiDung}}
                </div>
            </div>
            @endforeach
          

            <!-- Comment -->
           

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
                    @foreach ($tinlienquan as $tlq)
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{url("/tin-tuc/$tlq->id/$tlq->TieuDeKhongDau.html")}}">
                                <img class="img-responsive" src="{{asset("upload/tintuc/$tlq->Hinh")}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="#"><b>{{$tlq->TieuDe}}</b></a>
                        </div>
                        <div style="margin-left: 125px">
                            <p>{!!$tlq->TomTat!!}</p>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                    <!-- item -->
                    @foreach ($tinnoibat as $tt)
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{url("/tin-tuc/$tt->id/$tt->TieuDeKhongDau.html")}}">
                                <img class="img-responsive" src="{{asset("upload/tintuc/$tt->Hinh")}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{url("/tin-tuc/$tt->id/$tt->TieuDeKhongDau.html")}}"><b>{{$tt->TieuDe}}</b></a>
                        </div>
                        <div style="margin-left: 125px">
                            <p>{!!$tt->TomTat!!}</p>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    <!-- end item --!>               
                </div>
            </div>        
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection

