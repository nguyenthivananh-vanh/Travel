@extends('layout.index')
@section('content')
<div class="navbar-fixed">
    <nav class="teal">
      <div class="container">
        <a href="#home" class="brand-logo">My VietNam</a>
        <a href="#" data-activates="mobile-nav" class="button-collapse" (click)=" showNavbar()">
          <i class="material-icons">menu</i>
        </a>
  
        <ul class="right hide-on-med-and-down" >
          <li>
            <a href="#home">Trang chủ</a>
          </li>
          <li>
            <a>Tìm kiếm</a>
          </li>
          <li>
            <a>Đăng nhập</a>
          </li>
          <li>
            <a>Đăng kí</a>
          </li>
          <li>
            <a>Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </div> 
  <ul class="sideNav" id="mobileNav" *ngIf="!showFiller" >
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
  <section class="slider">
    <ul class="slides">
      <li>
        <img src="img/resort1.jpg" alt="resort1.jpg">
        <div class="caption center-align">
          <h2>Take Your Dream Vacation</h2>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni est id nam. Animi, asperiores quam!</h5>
          <a href="#" class="btn btn-large">Learn More</a>
        </div>
      </li>
      {{-- <li>
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
      </li> --}}
    </ul>
  </section>

  <section id="search" class="section section-search teal darken-1 white-text center scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h3>Tìm điểm đến </h3>
          <div class="input-field">
            <input type="text" class="white grey-text autocomplete" placeholder="Aroba, Cancun, etc..." id="autocomplete-input">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="popular" class="section section-popular scrollspy">
    <div class="container">
      <div class="row">
        <h4 class="center">
          <span class="teal-text">Popular</span> Places</h4>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="assets/img/resort1.jpg" alt="resort1.jpg">
              <span class="card-title">Nha Trang</span>
            </div>
            <div class="card-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit modi quia illo iure, distinctio perspiciatis.</p>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="assets/img/resort2.jpg" alt="resort2.jpg">
              <span class="card-title">Phú Quốc</span>
            </div>
            <div class="card-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit modi quia illo iure, distinctio perspiciatis.</p>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="assets/img/resort3.jpg" alt="resort3.jpg">
              <span class="card-title">Hội An</span>
            </div>
            <div class="card-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit modi quia illo iure, distinctio perspiciatis.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col s12 center">
          <a href="#contact" class="btn btn-large grey darken-3">
            <i class="material-icons left">send</i>Contact for Booking
          </a>
        </div>
      </div> -->
    </div>
  </section>


  <!-- Section: Gallery -->
  
  <section id="gallery" class="section section-gallery scrollspy">
    <div class="container">
      <h4 class="center">
        <span class="teal-text">Photo</span> Gallery
      </h4>
      <div class="row">
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?beach" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?travel" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?nature" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?beach,travel" alt="">
        </div>
      </div>
      <div class="row">
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?water" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?building" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?trees" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?cruise" alt="">
        </div>
      </div>
      <div class="row">
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?beaches" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?traveling" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?bridge" alt="">
        </div>
        <div class="col s12 m3">
          <img class="materialboxed responsive-img" src="https://source.unsplash.com/1600x900/?boat,travel" alt="">
        </div>
      </div>
    </div>
  </section>
  <section id="contact" class="section-contact scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="card-panel teal white-text center">
            <i class="material-icons medium">email</i>
            <h5>Liên hệ với chúng tôi:</h5>
          </div>
          <ul class="collection with-header">
            <li class="collection-header">
              <h4>Theo thông tin sau:</h4>
            </li>
            <li class="collection-item">
              My Vietnam
            </li>
            <li class="collection-item">
              Chiến Thắng , Hà Nội
            </li>
            <li class="collection-item">
              01328323293
            </li>
          </ul>
        </div>
  
        <div class="col s12 m6">
          <div class="card-panel grey lighten-3">
            <h5>Mời nhập</h5>
            <div class="input-field">
              <input type="text" placeholder="Tên của bạn" id="name">
              <label for="name">Tên </label>
            </div>
            <div class="input-field">
              <input type="email" placeholder="Email của bạn" id="email">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <input type="tel" placeholder="Số điện thoại của bạn" id="phone">
              <label for="phone">Số điện thoại</label>
            </div>
            <div class="input-field">
              <textarea class="materialize-textarea" placeholder="Lời nhắn của bạn" id="message"></textarea>
              <label for="message">Lời nhắn</label>
            </div>
            <input type="submit" value="Submit" class="btn">
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="section teal darken-2 white-text center">
    <p class="flow-text">My Vietnam &copy; 2021</p>
  </footer>
  @endsection
      
  @section('script')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
  var showFiller=true;
  function showNavbar(){
    this.showFiller =!this.showFiller;
  }

  
    // $(document).ready(function () {
    //   // INIT SIDENAV
    //   $(".button-collapse").sideNav();

    //   //INIT SLIDER
    //   $(".slider").slider({
    //     indicators: false,
    //     height: 500,
    //     transition: 500,
    //     interval: 6000
    //   });

    //   //AUTOCOMPLETE
    //   $(".autocomplete").autocomplete({
    //     data: {
    //       "Aruba": null,
    //       "Cancun Mexico": null,
    //       "Hawaii": null,
    //       "Florida": null,
    //       "California": null,
    //       "Jamaica": null,
    //       "Europe": null,
    //       "The Bahamas": null
    //     }
    //   });

    //   //INIT SCROLLSPY
    //   $(".scrollspy").scrollSpy();

    // });
  </script>
      
  @endsection
  