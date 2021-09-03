@extends('layout.index')
@section('content')
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
  