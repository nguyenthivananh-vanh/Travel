@extends('layout.index')
@section('slider')
<div class="slider">
  <ul class="slides">
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
  </ul>
</div>
@endsection
@section('search')
<div id="search" class="section section-search teal darken-2 white-text center scrollspy">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h3>Tìm điểm đến </h3>
        <form action="home/search" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="search">
          <div class="input-field input__search">
            <input type="text" style="padding-left: 12px" class="white grey-text autocomplete" placeholder="Tìm kiếm" id="autocomplete-input" name="search">      
          </div> 
          <button type="submit" class="btn_search--submit">Search</button>           

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
            
</section>
 
  @endsection
      
  @section('script')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
  <script rel="stylesheet" href="admin_asset/js/admin.js"></script>
  <script>
  var showFiller=true;
  function showNavbar(){
    this.showFiller =!this.showFiller;
  }
  <script src="js/jquery.js"></script>
   
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
  </script>
      
  @endsection
  