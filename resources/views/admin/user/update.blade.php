@include('layout.index')
<div class="login-page">
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}<br>
        </div>
    @endif
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    <div class="form">
        <h3>UPDATE</h3>
        <form action="admin\user\update\{{$user->id}}" method="POST">
        @csrf <!-- {{ csrf_field() }} -->
            <div class="form-group row">
                <label>Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->Ten}}"
                       aria-describedby="nameHelp" placeholder="Enter name" required>
            </div>
            <div class="form-group row">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                       aria-describedby="emailHelp" placeholder="Enter email" require>
            </div>
            <div class="check-is-changepassword">
                <label>Thay đổi mật khẩu<input type="checkbox" style="opacity: 1;position: relative"></label>
            </div>
            <div class="change-password display-none">
                <div class="form-group row">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           value="{{$user->password}}" placeholder="Password" require>
                </div>
                <div class="form-group row">
                    <label>Password Repeat</label>
                    <input type="password" class="form-control" id="password_rp" name="password_rp"
                           value="{{$user->password}}" placeholder="Repeat Password" require>
                </div>
            </div>
            <div class="form-group row">
                <label>Avater</label>
                <input type="file" class="form-control" id="hinhanh" name="hinhanh"/>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</div>
<script>
    const isCKpassword = $('.check-is-changepassword input[type="checkbox"]')
    $('.check-is-changepassword').on('click',function (){
        if (isCKpassword.is(':checked')){
            $('.change-password').show();
        }else {
            $('.change-password').hide();
        }
    })
</script>

