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
                    <a style="float: right;margin-bottom: 20px;" href="forgotPassWord">Quên mật khẩu</a>
                    {{-- <p style="float: right;margin-bottom: 20px; color: #1976d1" onClick="reset()"
                        class="mr-2">Reset</p> --}}
                </div>
                <br>
                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                <br />
                @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
                <br>
                <button type="submit">Đăng nhập</button>
                <div class="mb-3 text-center" style="margin-top: 20px; ">
                    <p class="text-align: center">Bạn chưa có tài khoản ?<a href="register" class="hover:no-underline">Đăng kí</a></p>
                </div> 
            </form>
        </div>
    </div>

</div>
<script>
    $().ready(function() {
      $("#myForm").validate({
        rules: {
         
          "password": {
            required: true,
            minlength: 6
          },
         
          "email":{
            required:true,
            email:true,
          }
        },
        messages:{
          
          "password": {
            required: "Vui lòng nhập tên mật khẩu",
            minlength: "Phải nhập 6 kí tự trở lên"
          },
          
          "email":{
            required:"Vui lòng nhập email",
            email:"Không đúng định dạng email",
          }
        }
      });
    });
</script>

