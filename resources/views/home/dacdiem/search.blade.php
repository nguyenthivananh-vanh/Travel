@extends('layout.index')
@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
<section id="popular" class="section section-popular scrollspy">
  <div class="container-fuild">
        <div class="row">
            
            <div class="col-12">
                <h4 class="center">
                <span class="teal-text">Popular</span> Places</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($noibat as $noibat)
            <div class="col-4">
<<<<<<< HEAD
                <div class="card">
                    <a href="#">
                    <div class="card-image">
                        <img style="height:200px" src="upload/diadiem/{{$noibat->HinhAnh}}" alt="img">
                        <span class="card-title">{{$noibat->TieuDe}}</span>
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
                  ">{{$noibat->TomTat}}</p>
                    </div>
                </div>
=======
        
              <div class="card">
                <a href="home/view/{{$noibat->id}}/{{$noibat->TacGia}}">
                  <div class="card-image">
                    <img style="height:200px" src="upload/diadiem/{{$noibat->HinhAnh}}" alt="img">
                    <span class="card-title">{{$noibat->TieuDe}}</span>
                  </div>
                </a>
                  <div class="card-content" >
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
                            ">{{$noibat->TomTat}}</p>
                  </div>
        
              </div>
        
        
>>>>>>> d1da7d4b95631a85b5471f2cc7bb2efbe009641e
            </div>
            @endforeach
          </div>
        

</section>


<!-- Section: Gallery -->

<section id="popular" class="section section-popular scrollspy">
    <div class="container-fuild">
          <div class="row">
              
              <div class="col-12">
                  <h4 class="center">
                  <span class="teal-text"></span> Places</h4>
              </div>
          </div>
          <div class="row">
<<<<<<< HEAD
              @foreach ($diadiem as $ddiem)
              <div class="col-4">
                  <div class="card">
                      <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}">
                      <div class="card-image">
                          <img style="height:200px" src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
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
=======
            @foreach ($diadiem as $ddiem)
            <div class="col-4">
        
              <div class="card">
                <a href="#">
                  <div class="card-image">
                    <img style="height:200px" src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                    <span class="card-title">{{$ddiem->TieuDe}}</span>
                  </div>
                </a>
                  <div class="card-content" >
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
>>>>>>> d1da7d4b95631a85b5471f2cc7bb2efbe009641e
                  </div>
        
              </div>
        
        
            </div>
            @endforeach
          </div>
          <div class="row">
            <div class="page">
                {{$diadiem->links("pagination::bootstrap-4")}}
            </div>
          </div>
      </div>
  
  </section>
  
  @endsection
      
  @section('script')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
  var showFiller=true;
  function showNavbar(){
    this.showFiller =!this.showFiller;
  }
  <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
  </script>
      
  @endsection
  