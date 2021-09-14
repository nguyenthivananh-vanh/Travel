@extends('layout.index')
@section('content')
    <section id="popular" class="section section-popular scrollspy mt-4">
        <div class="container-fuild">
            <div class="row mb-1">
                <div class="col-12">
                    <div class="search-container">
                        @if(isset($user))
                            <form action="home/search/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input
                                    style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px;margin-bottom:0px"
                                    type="text" placeholder="Search..." name="search">
                            </form>
                        @else
                            <form action="home/search" method="POST" enctype="multipart/form-data">
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
            <div class="row">
                @foreach ($DiaDiem as $ddiem)
                    <div class="col-4">

                        <div class="card">
                            @if(isset($user))
                                <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}/{{$user->id}}">
                                    <div class="card-image">
                                        <img class="post-img" style="height:200px"
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
                            text-overflow: ellipsis;
                      ">{{$ddiem->TomTat}}</p>
                                </div>
                            @else
                                <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}">
                                    <div class="card-image">
                                        <img class="post-img" style="height:200px"
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
                              text-overflow: ellipsis;
                        ">{{$ddiem->TomTat}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>


    </section>



    <!-- Section: Gallery -->

    {{-- <section id="gallery" class="section section-gallery scrollspy">
      <div class="container-fuild">

          <div class="col-12">
          <h4 class="center">
              <span class="teal-text">Photo</span> Gallery
            </h4>
            <div class="row">
              <div class="col-4">
                <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?beach" alt="">
              </div>
              <div class="col-4">
                <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?travel" alt="">
              </div>
              <div class="col-4">
                <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?nature" alt="">
              </div>
              <!-- <div class="col s12 m3">
                <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?beach,travel" alt="">
              </div> -->
            </div>
          <div class="row">
            <div class="col-4">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?water" alt="">
            </div>
            <div class="col-4">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?building" alt="">
            </div>
            <div class="col-4">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?trees" alt="">
            </div>
            <!-- <div class="col s12 m3">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?cruise" alt="">
            </div> -->
          </div>
          <div class="row">
            <div class="col-4">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?beaches" alt="">
            </div>
            <div class="col-4">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?traveling" alt="">
            </div>
            <div class="col-4">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?bridge" alt="">
            </div>
            <!-- <div class="col s12 m3">
              <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?boat,travel" alt="">
            </div> -->

          </div>
        </div>


    </section>
         --}}


@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        var showFiller = true;

        function showNavbar() {
            this.showFiller = !this.showFiller;
        }

        <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    </script>

@endsection
