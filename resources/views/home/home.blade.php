@extends('layout.index')
@section('slider')
<style>
  
</style>
<!-- <div class="slider"> -->
  <!-- <ul class="slides">
    <li>
      <img style="width:100%" src="upload/home/resort1.jpg" alt="resort1.jpg" >
      <div class="caption center-align">
        <h2>Take Your Dream Vacation</h2>
        <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni est id nam. Animi, asperiores quam!</h5>
        <a href="#" class="btn btn-large">Learn More</a>
      </div>
    </li>
    <li>
      <img style="width:100%" src="upload/home/resort2.jpg" alt="resort2.jpg">
      <div class="caption left-align">
        <h2>We Work With All Budgets</h2>
        <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni est id nam. Animi, asperiores quam!</h5>
        <a href="#" class="btn btn-large">Learn More</a>
      </div>
    </li>
    <li>
      <img style="width:100%" src="upload/home/resort3.jpg" alt="resort3.jpg">
      <div class="caption right-align">
        <h2>Group & Individual Gataways</h2>
        <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni est id nam. Animi, asperiores quam!</h5>
        <a href="#" class="btn btn-large">Learn More</a>
      </div>
    </li>
  </ul> -->

<div class="slideshow-container">

<div class="mySlides fade"  style="width:100vw">
  <div class="numbertext">1 / 3</div>
  <img src="upload/home/resort1.jpg" >
  <div class="text">
     <h3>Explore Vietnam</h3>
     <p>Tìm hiểu về những di sản văn hóa quốc gia , những hang động kì bí , đường biển tuyệt đẹp</p>
  </div>
</div>

<div class="mySlides fade"  style="width:100vw">
  <div class="numbertext">2 / 3</div>
  <img src="upload/home/resort2.jpg"  alt="img2">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade"  style="width:100vw">
  <div class="numbertext">3 / 3</div>
  <img src="upload/home/resort3.jpg"  alt="img3">
  <div class="text">Caption Three</div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')



<section id="gallery" class="section section-gallery scrollspy">
  <h4 class="center">
    <span class="teal-text">Popular</span> Places
  </h4>
  <div class="row">
    @foreach ($DiaDiem as $ddiem)
    <div class="col-4">

      <div class="card">
        <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}">
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
          </div>

      </div>


  </div>
  @endforeach

</section>

  @endsection

  @section('script')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <!-- <script rel="stylesheet" href="admin_asset/js/admin.js"></script>
  <script  href="admin_asset/js/homepage.js"></script> -->
  <script type="text/javascript" src="admin_asset/js/homepage.js"></script>
  <!-- <script type="text/javascript" src="admin_asset/js/admin.js"></script> -->
 

  
  <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
 

  @endsection
