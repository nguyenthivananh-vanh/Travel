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
                <div class="card">
                    <a href="#">
                    <div class="card-image">
                        <img src="upload/diadiem/{{$noibat->HinhAnh}}" alt="img">
                        <span class="card-title">{{$noibat->TieuDe}}</span>
                    </div>
                    </a>
                    <div class="card-content">
                        <p>{{$noibat->TomTat}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
              @foreach ($diadiem as $ddiem)
              <div class="col-4">
                  <div class="card">
                      <a href="#">
                      <div class="card-image">
                          <img src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                          <span class="card-title">{{$ddiem->TieuDe}}</span>
                      </div>
                      </a>
                      <div class="card-content">
                          <p>{{$ddiem->TomTat}}</p>
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
  