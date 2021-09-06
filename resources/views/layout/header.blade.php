<div class="navbar-fixed">
    <nav class="teal">
      <div class="container">
        <a href="home/home" class="brand-logo">My VietNam</a>
        <a href="#" data-activates="mobile-nav" class="button-collapse" onClick=" showNavbar()">
          <i class="material-icons">menu</i>
        </a>
  
        
        <!-- @if (isset($user) && strcasecmp( $user->Ten, 'admin123' ) == 0 )      
        <ul class="right hide-on-med-and-down" > -->
        <ul class="right hide-on-med-and-down"  style="display:none">
          <li>
            <a href="home/home/{{$user->id}}">Trang chủ</a>
          </li>
       
          <li>
            <a href="#">Viết bài</a>
          </li>
          <li>
            <a href="#">Admin</a>
          </li>
          <li>
            <a href="#">Cài đặt</a>
          </li>

        </ul>
        <!-- @elseif(isset($user))
        <ul class="right hide-on-med-and-down" >
          <li>
            <a href="home/home/{{$user->id}}">Trang chủ</a>
          </li>
          <li>
            <a href="login">Viết bài</a>
          </li>
          <li>
            <a href="register">Cài đặt</a>
          </li>
        </ul> -->
        <ul class="right hide-on-med-and-down header-login-list" >
          <!-- <li>
            <a href="home/home">Trang chủ</a>
          </li> -->
          <li class="header-login-item">
            <a href="register">Admin</a>
          </li>
          <li class="header-login-item">
            <a href="login">Viết bài</a>
          </li>
          <li class="header-login-item">
            <a href="login"><i class="far fa-bell mr-1" style="font-size: 15px;"></i>Thông báo</a>
          </li> 
          <li class="header-login-item">
            <a  onClick="showUserMenu()"><img src="upload/users/ava-admin.jpg" class="circle" style='width:38px; height:38px' alt="Avatar User"></a>
            <ul class="header__nav-user-menu" id="headerUserMenu">
                                <li class="header__nav-user-item">
                                  <a style="display:flex">
                                    <!-- <img src="upload/users/ava-admin.jpg" class="circle" style='width:38px; height:38px' alt="Avatar User"> </a> -->
                                    <b  style="color:black; font-size:18px">lesyeuxde</b>
                                  </a>
                                </li>
                                <li class="header__nav-user-item">
                                    <a href=""><i class="far fa-file-alt"></i> viết của bạn</a>

                                </li>
                                <li class="header__nav-user-item">
                                    <a href=""><i class="far fa-comment-alt"></i>Bình luận của bạn</a>
                                </li>

                                <li class="header__nav-user-item">
                                    <a href=""><i class="fas fa-cog"></i> chỉnh tài khoản</a>

                                </li>

                                <li class="header__nav-user-item header__nav-user-item--separate">
                                    <a href=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>

                                </li>

                                
                            </ul>
          </li>
          

        </ul>
        @else 
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
        @endif
      </div>
    </nav>
  </div> 
  {{-- <ul class="sideNav" id="mobileNav" if="!showFiller" >
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
      
        
  </ul> --}}
 
  {{-- <script src="admin_asset/js/admin.js"></script>
  <script src="admin_asset/js/homepage.js"></script> --}}