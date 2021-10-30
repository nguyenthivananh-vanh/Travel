@include('index')
<link href="admin_asset/css/login.css" rel="stylesheet">


<div class=" bg">
    <div class="overlay"></div>
    <div class="form fadeInDown">
        <div class=" form-login">
            <h2 style="color:#1976d2;">Đăng nhập</h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach
                </div>
            @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <form action="login" method="POST" enctype="multipart/form-data" id="myForm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group row">
                    <input type="email" class="form-control pl-1" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter email" require>
                </div>
                <div class="form-group row">
                    <input type="password" class="form-control pl-1" id="password" name="password" placeholder="Password"
                        require>
                </div>
                <div>
                    <a style="float: right;margin-bottom: 20px;" href="forgotPassWord">Quên mật khẩu ?</a>
                    <p style="float: right;margin-bottom: 20px; color: #1976d1" onClick="reset()"
                        class="mr-2">Reset</p>

                </div>
                <br>
                <br>
                <button type="submit">Đăng nhập</button>
            </form>
        </div>
    </div>

</div>
<script type="text/javascript">
    function validateForm() {
        var email = document.getElementById('email').value;
        var pw = document.getElementById('password').value;

        if (email == null || email == "") {
            alert("Bạn chưa nhập Email");
            return false;
        } else if (pw == null || pw == "") {
            alert("Bạn chưa nhập Password");
            return false;
        }
        if (pw.length < 3 || pw.length > 32) {
            alert("Password phải lớn hơn 3 kí tự và nhỏ hơn 32 kí tự")
            return false;
        }
    }

    function reset() {
        document.getElementById("myForm").reset();
    }
</script>
