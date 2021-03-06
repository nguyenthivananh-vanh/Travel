<div class="container-fuild " style="position:relative">
    <div class="side-nav-admin nav-wrapper admin__menu--tablet" style="height:100vh">
        <div class="menu-admin" style="background-color:#1976d2">
            <div class="title-admin">
                <div class="home" style="color: white">
                    <a style="color: white" href="admin/adminHome/{{ $user->id }}" class="brand-logo">Admin</a>
                </div>
            </div>
        </div>
        <ul id="side-nav-admin" class="side-nav-admin menu-admin">

            <li class="" style="display:flex; align-items:center">
                <img src="upload/users/{{ $user->Avatar }}" class="circle-admin avatar-user" alt="Avatar User">
                <p>{{ $user->Ten }}</p>
            </li>
            <li><a style="color: #1976d2;" href="home/home/{{ $user->id }}" class="brand-logo">Home</a></li>
            <li>
                <a href="admin/vungmien/list/{{ $user->id }}">Vùng miền</a>
            </li>
            <li>
                <a href="admin/dacdiem/list/{{ $user->id }}">Đặc điểm</a>
            </li>
            <li>
                <a href="admin/diadiem/list/{{ $user->id }}">Địa điểm</a>
            </li>
            <li>
                <a href="admin/video/list/{{ $user->id }}">Video</a>
            </li>
            <li>
                <a href="admin/user/list/{{ $user->id }}">Users</a>
            </li>
            <li>
                <a href="admin/comment/list/{{ $user->id }}">Bình luận</a>
            </li>

            <li>
                <a href="admin/monan/list/{{ $user->id }}">Món ăn</a>
            </li>
            <li style="border-bottom:none">
                <a href="admin/thongke/list/{{ $user->id }}">Thống kê</a>
            </li>
        </ul>
        <div class="menu-admin" style="background-color:#fff; bottom:0; border-top: 1px solid #ddd">
            <div class="title-admin">
                <div class="home" style="color: black">
                    <a style="color: #1976d2" href="home/home/{{ $user->id }}" class="brand-logo">&copy; 2021
                        My Vietnam</a>
                </div>
            </div>
        </div>
    </div>
    <div class="admin__menu--mobile" id="menu-mobile" style="background-color:#fff !important; display:none;">
        <div class="side-nav-admin nav-wrapper ">
            <div class="menu-admin" style="padding-left:35px;">
                <div class="title-admin" style="border-left-width: 0px;">
                    <div class="exit" onclick="exit()">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="admin-infor">
                        <img src="upload/users/{{ $user->Avatar }}" class="circle-admin avatar-user" alt="Avatar User">
                        <p>{{ $user->Ten }}</p>
                    </div>
                </div>
            </div>
            <ul id="side-nav-admin" class="side-nav-admin-item menu-admin">
                <li><a style="color: #1976d2;" href="home/home/{{ $user->id }}" class="brand-logo">Home</a>
                </li>
                <li>
                    <a href="admin/vungmien/list/{{ $user->id }}">Vùng miền</a>
                </li>
                <li>
                    <a href="admin/dacdiem/list/{{ $user->id }}">Đặc điểm</a>
                </li>
                <li>
                    <a href="admin/diadiem/list/{{ $user->id }}">Địa điểm</a>
                </li>
                <li>
                    <a href="admin/video/list/{{ $user->id }}">Video</a>
                </li>
                <li>
                    <a href="admin/user/list/{{ $user->id }}">Users</a>
                </li>
                <li>
                    <a href="admin/comment/list/{{ $user->id }}">Bình luận</a>
                </li>

                <li>
                    <a href="admin/monan/list/{{ $user->id }}">Món ăn</a>
                </li>
                <li style="border-bottom:none">
                    <a href="admin/thongke/list/{{ $user->id }}">Thống kê</a>
                </li>
            </ul>
            <div class="menu-admin" style="background-color:#fff; bottom:0; border-top: 1px solid #ddd">
                <div class="title-admin">
                    <div class="home" style="color: black">
                        <a style="color: #1976d2" href="home/home/{{ $user->id }}" class="brand-logo">&copy;
                            2021 My Vietnam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
