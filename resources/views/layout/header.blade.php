<link href="admin_asset/css/home.css" rel="stylesheet">
<div class="navbar-fixed" style="position:relative">
    <nav class="teal">
        <div class="container">
            @if (isset($user) )
                <a href="home/home/{{$user->id}}" class="brand-logo"><img src="upload/home/myVietnam-big1.png"
                                                                          alt="logo" style="width: 200px; height:54px"></a></a>
                <a data-activates="mobile-nav" class="button-collapse" onClick="showNavMobile()">
                    <i class="material-icons">menu</i>
                </a>
                @if($user->PhanQuyen == 1 )
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="home/home/{{$user->id}}">Trang chủ</a>
                        </li>

                        <li>
                            <a href="home/reply/{{$user->id}}">Viết bài</a>
                            <div class="notify" onload="show()" style="display:none">
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}<br>
                                    </div>
                                @endif
                            </div>


                        </li>
                        <li>
                            <a href="admin/adminHome/{{$user->id}}">Admin</a>
                        </li>
                        <li class="header-login-item">
                            <a onClick="showUserMenu()"> <img src="upload/users/{{$user->Avatar}}"
                                                              class="avatar-user circle"
                                                              style='width:38px; height:38px;margin-right: 18px'
                                                              alt="Avatar User">{{$user->Ten}}</a>
                            <ul class="header__nav-user-menu" id="headerUserMenu">
                                <li class="header__nav-user-item">
                                    <a style="display:flex">
                                        {{-- <img src="upload/users/ava-admin.jpg" class="avatar-user circle" style='width:38px; height:38px' alt="Avatar User">  --}}
                                        <b style="color:black; font-size:18px">{{$user->Ten}}</b>
                                    </a>

                                <li class="header__nav-user-item">
                                    <a href="user/update/{{$user->id}}"><i class="fas fa-cog"></i> Thay đổi thông
                                        tin tài khoản</a>
                                </li>

                                <li class="header__nav-user-item header__nav-user-item--separate">
                                    <a href="home/home"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>

                                </li>
                            </ul>
                        </li>
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
                            <a onClick="showUserMenu()"> <img src="upload/users/{{$user->Avatar}}"
                                                              class="circle avatar-user"
                                                              style='width:38px; height:38px;margin-right: 18px'
                                                              alt="Avatar User">{{$user->Ten}}</a>
                            <ul class="header__nav-user-menu" id="headerUserMenu">
                                <li class="header__nav-user-item">
                                    <a style="display:flex">
                                        <!-- <img src="upload/users/ava-admin.jpg" class="circle" style='width:38px; height:38px' alt="Avatar User"> </a> -->
                                        <b style="color:black; font-size:18px; ">{{$user->Ten}}</b>
                                    </a>
                                </li>


                                <li class="header__nav-user-item">
                                    <a href="user/update/{{$user->id}}"><i class="fas fa-cog"></i> Thay đổi thông
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
                <a href="home/home" class="brand-logo">

                    <img src="upload/home/myVietnam-big1.png" alt="logo" style="width: 200px; height:54px"></a>
                <a data-activates="mobile-nav" class="button-collapse" onClick="showNavMobile()">
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


<script>
    var sideNavHome = document.getElementById('hy');
    window.onclick = function (event) {
        if (event.target == sideNavHome) {
            alert('h2')
            document.getElementById('hy').style.display = "none";
        }
    }

    var userMenu = document.getElementById('headerUserMenu');

    function showUserMenu() {
        alert("hello")
        userMenu.classList.toggle("displayBlock");
    }
</script>
