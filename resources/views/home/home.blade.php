@extends('layout.index')
@section('slider')


    <div class="slideshow-container">

        <div class="mySlides fade" style="width:100vw">
            <div class="numbertext">1 / 3</div>
            <img class="post-img" src="upload/home/resort1.jpg">
            <div class="text">
                <h3>Explore Vietnam</h3>
                <p>Tìm hiểu về những di sản văn hóa quốc gia , những hang động kì bí , đường biển tuyệt đẹp</p>
            </div>
        </div>

        <div class="mySlides fade" style="width:100vw">
            <div class="numbertext">2 / 3</div>
            <img class="post-img" src="upload/home/resort2.jpg" alt="img2">
            <div class="text">
                <h3>Explore Vietnam</h3>
                <p>Những phong tục , tập quán của các dân tộc anh em trên khắp vùng miền</p>
            </div>
        </div>

        <div class="mySlides fade" style="width:100vw">
            <div class="numbertext">3 / 3</div>
            <img class="post-img" src="upload/home/resort3.jpg" alt="img3">
            <div class="text">
                <h3>Explore Vietnam</h3>
                <p>Những tinh hoa văn hóa và ẩm thực của Việt Nam trên mọi nẻo đường của tổ quốc.</p>
            </div>
        </div>

    </div>
    <!-- <br>

    <div style="text-align:center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div> -->

@endsection
@section('search')
    <div id="search" class="section section-search teal darken-2 white-text center scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3>Tìm điểm đến </h3>
                    @if(isset($user))
                        <form action="home/search/{{$user->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="search">
                                <div class="input-field input__search">
                                    <input type="text" style="padding-left: 12px" class="white grey-text autocomplete"
                                           placeholder="Tìm kiếm" id="autocomplete-input" name="search">
                                </div>
                                <button type="submit" class="btn_search--submit" style=" color: black">Search</button>

                            </div>
                        </form>
                    @else
                        <form action="home/search" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="search">
                                <div class="input-field input__search">
                                    <input type="text" style="padding-left: 12px" class="white grey-text autocomplete"
                                           placeholder="Tìm kiếm" id="autocomplete-input" name="search">
                                </div>
                                <button type="submit" class="btn_search--submit" style=" color: black">Search</button>

                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <section id="gallery" class="section section-gallery scrollspy">
        <h4 class="center">
            <span class="teal-text">Địa điểm mới nhất</span>
        </h4>
        @if(isset($user))
            <div class="row">
                @foreach ($Diadiem as $diadiem)
                    <div class="col-4">
                        <div class="card">
                            <a href="home/view/{{$diadiem->id}}/{{$diadiem->TacGia}}/{{$user->id}}">
                                <div class="card-image">
                                    <img class="post-img" style="height:200px" src="upload/diadiem/{{$diadiem->HinhAnh}}"
                                         alt="img">
                                    <span class="card-title">{{$diadiem->TieuDe}}</span>
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
                    ">{{$diadiem->TomTat}}</p>
                            </div>

                        </div>


                    </div>

                @endforeach

            </div>
        @else
            <div class="row">
                @foreach ($Diadiem as $ddiem)
                    <div class="col-4">

                        <div class="card">
                            <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}">
                                <div class="card-image">
                                    <img class="post-img" style="height:200px" src="upload/diadiem/{{$ddiem->HinhAnh}}"
                                         alt="img">
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
                          text-overflow: ellipsis;
                    ">{{$ddiem->TomTat}}</p>
                            </div>

                        </div>


                    </div>

                @endforeach

            </div>
        @endif
    </section>
    <section>
        <div class="destination">
            <div class="destination-before"></div>
            <span style="margin: 0 10px" class="destination-tittle" id="test2">Điểm đến hấp dẫn</span>
            <div class="destination-after"></div>
        </div>
        <div id="content-slider">
            <div class="wrapper">
                <!-- <h2>Slick Carousel Example<h2> -->
                <div class="autoplay">
                    @foreach ($DiaDiem as $ddiem)
                        <div class="col-4">
                            <div class="card">
                                <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}">
                                    <div class="card-image">
                                        <img class="post-img" style="height:200px"
                                             src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                                        <span class="card-title">{{$ddiem->TieuDe}}</span>
                                    </div>
                                </a>
                            <!-- <div class="card-content" >
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
                          ">{{$ddiem->TomTat}}</p>
                </div> -->

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script href="admin_asset/js/homepage.js"></script>
    {{-- <script type="text/javascript" src="admin_asset/js/slider.js"></script> --}}
    <!-- <script type="text/javascript" src="admin_asset/js/admin.js"></script> -->

    <script>
        var showFiller = true;

        function showNavbar() {
            this.showFiller = !this.showFiller;
        }
    </script>

@endsection
