<div class="navbar-fixed">
    <nav class="teal">
      <div class="container">
        <a href="home/home" class="brand-logo">My VietNam</a>
        <a href="#" data-activates="mobile-nav" class="button-collapse" (click)=" showNavbar()">
          <i class="material-icons">menu</i>
        </a>
  
        <ul class="right hide-on-med-and-down" >
          <li>
            <a href="home/home">Trang chủ</a>
          </li>
          {{-- <li>
            <a >Tìm kiếm</a>
          </li> --}}
          <li>
            <a href="login">Đăng nhập</a>
          </li>
          <li>
            <a href="register">Đăng kí</a>
          </li>
          <li>
            <a>Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </div> 
  <ul class="sideNav" id="mobileNav" if="!showFiller" >
    <li class="nav-li">
      <p>Trang chủ</p>
    </li>
    <li  class="nav-li">
      <p>Tìm kiếm</p>
    </li>
    <li  class="nav-li">
      <p>Đăng kí</p>
    </li>
    <li  class="nav-li">
      <p>Đăng nhập</p>
    </li>
    <li  class="nav-li">
      <p>Contact</p>
    </li>
      
        
  </ul>
  <div class="slider">
    {{-- <div class="row carousel-holder">
      <div class="col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                  <div class="item active">
                      <img class="slide-image" style="width: 100%" src="upload/home/DaNang.jpg" alt="">
                  </div>
                  <div class="item">
                      <img class="slide-image" style="width: 100%" src="upload/home/HoiAn.jpg" alt="">
                  </div>
                  <div class="item">
                      <img class="slide-image" style="width: 100%" src="upload/home/HaLong.jpg" alt="">
                  </div>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
          </div>
      </div>
  </div> --}}
    {{-- <ul class="slides">
      <li>
        <img src="upload/home/resort1.jpg" alt="resort1.jpg">
        <div class="caption center-align">
          <h2>Take Your Dream Vacation</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni est id nam. Animi, asperiores quam!</h5>
          <a href="#" class="btn btn-large">Learn More</a>
        </div>s
      </li>
      <li>
        <img src="img/resort2.jpg" alt="resort2.jpg">
        <div class="caption left-align">
          <h2>We Work With All Budgets</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni est id nam. Animi, asperiores quam!</h5>
          <a href="#" class="btn btn-large">Learn More</a>
        </div>
      </li>
      <li>
        <img src="img/resort3.jpg" alt="resort3.jpg">
        <div class="caption right-align">
          <h2>Group & Individual Gataways</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni est id nam. Animi, asperiores quam!</h5>
          <a href="#" class="btn btn-large">Learn More</a>
        </div>
      </li> 
    </ul>
     --}}
  </div>

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