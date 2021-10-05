<div class="container ">
    <div class="side-nav-admin nav-wrapper">
        <div class="menu-admin">
            <div class="title-admin">
                <div class="home" >
                    <a href="home/home/{{$user->id}}" class="brand-logo"><i class="fas fa-home" ></i>Home</a>                       
                </div>
                
                <div class="admin-infor">
                    <img src="upload/users/{{$user->Avatar}}" class="circle-admin avatar-user" alt="Avatar User">
                    <p >{{$user->Ten}}</p>
                </div>
            </div>       
        </div>
                           
           
            <ul id="side-nav-admin" class="side-nav-admin menu-admin">
              
    
            <li>
                <a href="admin/vungmien/list">Vùng miền</a>
            </li>
            <li>
                <a href="admin/dacdiem/list">Đặc điểm</a>
            </li>
            <li>
                <a href="admin/diadiem/list">Địa điểm</a>
            </li>
            <li>
                <a href="admin/video/list">Video</a>
            </li>
            <li>
                <a href="admin/user/list">Users</a>
            </li>
            <li>
                <a href="admin/comment/list">Comments</a>
            </li>
            <li>
                <a href="admin/thongke/list">Thống kê</a>
            </li>
            <li>
                <a href="admin/monan/list">Món ăn</a>
            </li>
        </ul>
    </div>
</div>

