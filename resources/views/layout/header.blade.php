<div class="navbar-fixed">
    <nav class="teal">
        <div class="container">
            @if (isset($user) )
                <a href="home/home/{{$user->id}}" class="brand-logo">My VietNam</a>
                <a href="#" data-activates="mobile-nav" class="button-collapse" onClick=" showNavbar()">
                    <i class="material-icons">menu</i>
                </a>
                @if($user->Ten == "admin" )
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="home/home/{{$user->id}}">Trang chủ</a>
                        </li>

                        <li>
                            <a href="home/dacdiem/reply/{{$user->id}}">Viết bài</a>
                        </li>
                        <li>
                            <a href="admin/adminHome">Admin</a>
                        </li>

                        <li class="header-login-item">
                            <a onClick="showUserMenu()"> <img src="upload/users/{{$user->Avatar}}" class="circle"
                                                              style='width:38px; height:38px;margin-right: 18px'
                                                              alt="Avatar User">{{$user->Ten}}</a>
                            <ul class="header__nav-user-menu" id="headerUserMenu">
                                <li class="header__nav-user-item">
                                    <a style="display:flex">
                                        {{-- <img src="upload/users/ava-admin.jpg" class="circle avatar-user" style='width:38px; height:38px' alt="Avatar User">  --}}
                                        <b style="color:black; font-size:18px">{{$user->Ten}}</b>
                                    </a>
                                </li>
                                <li class="header__nav-user-item">
                                    <a href=""><i class="far fa-file-alt"></i> Bài viết của bạn</a>

                                </li>
                                <li class="header__nav-user-item">
                                    <a href=""><i class="far fa-comment-alt"></i>Bình luận của bạn</a>
                                </li>

                                <li class="header__nav-user-item">
                                    <a href="admin/user/update/{{$user->id}}"><i class="fas fa-cog"></i> Thay đổi thông
                                        tin tài khoản</a>

                                </li>

                                <li class="header__nav-user-item header__nav-user-item--separate">
                                    <a href="home/home"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>

                                </li>
                            </ul>
                        </li>
                        <li> {{$user->Ten}}</li>
                    </ul>
                @else
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="home/home/{{$user->id}}">Trang chủ</a>
                        </li>
                        <li>
                            <a href="home/reply/{{$user->id}}">Viết bài</a>
                        </li>

                        <li class="header-login-item">
                            <a onClick="showUserMenu()"> <img src="upload/users/{{$user->Avatar}}" class="circle"
                                                              style='width:38px; height:38px;margin-right: 18px'
                                                              alt="Avatar User"> {{$user->Ten}}</a>
                            <ul class="header__nav-user-menu" id="headerUserMenu">
                                <li class="header__nav-user-item">
                                    <a style="display:flex">
                                        <!-- <img src="upload/users/ava-admin.jpg" class="circle" style='width:38px; height:38px' alt="Avatar User"> </a> -->
                                        <b style="color:black; font-size:18px">{{$user->Ten}}</b>
                                    </a>
                                </li>
                                <li class="header__nav-user-item">
                                    <a href=""><i class="far fa-file-alt"></i> Bài viết của bạn</a>

                                </li>
                                <li class="header__nav-user-item">
                                    <a href=""><i class="far fa-comment-alt"></i>Bình luận của bạn</a>
                                </li>

                                <li class="header__nav-user-item">
                                    <a href="admin/user/update/{{$user->id}}"><i class="fas fa-cog"></i> Thay đổi thông
                                        tin tài khoản</a>

                                </li>

                                <li class="header__nav-user-item header__nav-user-item--separate">
                                    <a href="home/home"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                @endif
            @else
                <a href="home/home" class="brand-logo">My VietNam</a>
                <a href="#" data-activates="mobile-nav" class="button-collapse" onClick=" showNavbar()">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
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

{{-- <script src="admin_asset/js/admin.js"></script>--}}
{{-- <script src="admin_asset/js/homepage.js"></script>  --}}
<script>
    var userMenu = document.getElementById('headerUserMenu');

    function showUserMenu() {
        userMenu.classList.toggle("displayBlock");
    }
</script>
