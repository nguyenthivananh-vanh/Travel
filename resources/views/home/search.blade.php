@extends('layout.index')

@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
    <section id="popular" class="section section-popular scrollspy  mt-4">
        <div class="container-fuild">
            <div class="row mb-1">
                <div class="col-12">
                    <div class="search-container">
                        @if(isset($user))
                            <form action="home/search/{{$user->id}}" method="GET" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input
                                    style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px;margin-bottom:0px"
                                    type="text" placeholder="Search..." name="search">
                            </form>
                        @else
                            <form action="home/search" method="GET" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input
                                    style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px;margin-bottom:0px"
                                    type="text" placeholder="Search..." name="search">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6 class="center">
                        <span class="teal-text">Kết quả tìm kiếm:</span>{{$key}} </h6>
                </div>
            </div>
            <div class="container-fuild">
                <div class="row">
                    <div class="col-12">
                        <h4 class="center">
                            <span class="teal-text"></span> Địa điểm </h4>
                    </div>
                </div>
                @if(isset($user))
                    <div class="row">
                        @foreach ($diadiem as $ddiem)
                            <div class="col-4">
                                <div class="card">
                                    <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}/{{$user->id}}">
                                        <div class="card-image">
                                            <img class="fit-img" style="height:200px"
                                                 src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                                            <span class="card-title">{{$ddiem->TieuDe}}</span>
                                        </div>
                                    </a>
                                    <div class="card-content">
                                        <p style="display: block;
                        display: -webkit-box;
                        height: 38px;
                        margin: 0 auto;
                        font-size: 14px;
                        line-height: 1.5;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;">{{$ddiem->TomTat}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        @foreach ($diadiem as $ddiem)
                            <div class="col-4">
                                <div class="card">
                                    <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}">
                                        <div class="card-image">
                                            <img class="fit-img" style="height:200px"
                                                 src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                                            <span class="card-title">{{$ddiem->TieuDe}}</span>
                                        </div>
                                    </a>
                                    <div class="card-content">
                                        <p style="display: block;
                        display: -webkit-box;
                        height: 38px;
                        margin: 0 auto;
                        font-size: 14px;
                        line-height: 1.5;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;">{{$ddiem->TomTat}}</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="page" >
                    {{$diadiem->links("pagination::bootstrap-4")}}
                </div>
            </div>
           
        </div>
    </section>

    <section>
        <div class="destination">
            <div class="destination-before"></div>
            <span style="margin: 0 10px" class="destination-tittle" id="test2">Ẩm thực nơi đây </span>
            <div class="destination-after"></div>
        </div>
        <div class="row">
            @foreach ($MonAn as $monan)
                <div class="col-4">
                    <div class="card">
                        @if(isset($user))
                            <a href="home/viewMonAn/{{$monan->id}}/{{$monan->idDiaDiem}}/{{$user->id}}">
                                <div class="card-image">
                                    <img class="post-img" style="height:200px"
                                         src="upload/monan/{{$monan->HinhAnh}}" alt="img">
                                    <span class="card-title">{{$monan->TenMonAn}}</span>
                                </div>
                            </a>
                            <div class="card-content">
                                <p style="display: block;
                            display: -webkit-box;
                            height: 38px;
                            margin: 0 auto;
                            font-size: 14px;
                            line-height: 1.5;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                      ">{{$monan->TieuDe}}</p>
                            </div>
                        @else
                            <a href="home/viewMonAn/{{$monan->id}}/{{$monan->idDiaDiem}}">
                                <div class="card-image">
                                    <img class="post-img" style="height:200px"
                                         src="upload/monan/{{$monan->HinhAnh}}" alt="img">
                                    <span class="card-title">{{$monan->TenMonAn}}</span>
                                </div>
                            </a>
                            <div class="card-content">
                                <p style="display: block;
                              display: -webkit-box;
                              height: 38px;
                              margin: 0 auto;
                              font-size: 14px;
                              line-height: 1.5;
                              -webkit-line-clamp: 2;
                              -webkit-box-orient: vertical;
                              overflow: hidden;
                              text-overflow: ellipsis;
                        ">{{$monan->TieuDe}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Section: Gallery -->

   


@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        var showFiller = true;

        function showNavbar() {
            this.showFiller = !this.showFiller;
        }

        
    </script>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>

@endsection
