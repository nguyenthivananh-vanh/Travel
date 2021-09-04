@extends('layout.index')
@section('content')
<section id="popular" class="section section-popular scrollspy mt-4">
  <div class="container-fuild">
  <div class="row mb-1">
      <div class="col-12">
        <div class="search-container">
          <form action="admin/diadiem/search" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="search">
            <input style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px;margin-bottom:0px"
            type="text" placeholder="Search..." name="search">
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h6 class="center">
          <span class="teal-text">Kết quả tìm kiếm:</span> Places dfhjsdsfsfksfsdfksdfkfshdfhksdfhsdfkdsf
        fjdfjsfjsfsdfsdkf</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
          <div class="card">
            @foreach ($diadiem as $ddiem)
            <a href="#">
              <div class="card-image">
                <img src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                <span class="card-title">{{$ddiem->TieuDe}}</span>
              </div>
            </a>
              <div class="card-content">
                <p>{{$ddiem->TomTat}}</p>
              </div>
            @endforeach
          </div>
      </div>
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
  