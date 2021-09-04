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
       
          <li>
            <a href="login">Đăng nhập</a>
          </li>
          <li>
            <a href="register">Đăng kí</a>
          </li>
        </ul>
        <ul class="right hide-on-med-and-down"  style="display:none">
          <li>
            <a href="home/home">Trang chủ</a>
          </li>
       
          <li>
            <a href="login">Viết bài</a>
          </li>
          <li>
            <a href="register">Admin</a>
          </li>
          <li>
            <a href="register">Cài đặt</a>
          </li>

        </ul>
        <ul class="right hide-on-med-and-down"  style="display:none">
          <li>
            <a href="home/home">Trang chủ</a>
          </li>
          <li>
            <a href="login">Viết bài</a>
          </li>
          <li>
            <a href="register">Cài đặt</a>
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
      <p>Đăng kí</p>
    </li>
    <li  class="nav-li">
      <p>Đăng nhập</p>
    </li>
    <li  class="nav-li">
      <p>Contact</p>
    </li>
      
        
  </ul>
 
  {{-- <script src="admin_asset/js/admin.js"></script>
  <script src="admin_asset/js/homepage.js"></script> --}}