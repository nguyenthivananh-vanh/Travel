@include('index')
<link href="admin_asset/css/login.css" rel="stylesheet">
<style>
    .error{
      color: #c0392b;
    }
  </style>
<div class="login-page bg fadeInDown">
    <div class="overlay"></div>
    <div class="form">
        <div class="form-login">
            <h4 style="color:#1976d2;">Đăng ký</h4>
            
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <form action="register" method="POST" enctype="multipart/form-data" id="form-register">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group row">
                    <input type="text" class="form-control pl-2" id="name" name="ten" aria-describedby="nameHelp"
                        placeholder="Nhập tên tài khoản" style="text-align:left;" required>
                </div>
                @if($errors->has('name'))
                    <span style="color: #c0392b">  {{$errors->first('ten')}}</span>           
                @endif
                <div class="form-group row">
                    <input type="email" class="form-control pl-2" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Nhập email" require>
                </div>
                @if($errors->has('email'))
                    <span style="color: #c0392b"> {{$errors->first('email')}}</span>       
                @endif
                <div class="form-group row">
                    <input type="password" class="form-control pl-2" id="password" name="pass" placeholder="Mật khẩu"
                        require>
                </div>
                <div class="form-group row">
                    <input type="password" class="form-control pl-2" id="confirm" name="confirm"
                        placeholder="Nhập lại mật khẩu" require>
                </div>

                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                <br />
                @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
                <button type="submit" style="border-radius:5px">Đăng ký</button>
                <div class="mb-3 text-center" style="margin-top: 20px">
                    <p class="text-align: center">Bạn đã có tài khoản ?<a href="login" class="hover:no-underline">Đăng nhập</a></p>
                </div> 
            </form>
        </div>
    </div>
</div>
</section>

  <script>
    $().ready(function() {
      $("#form-register").validate({
        rules: {
          "name": {
            required: true,
            minlength: 3,
            maxlength:30,
          },
          "password": {
            required: true,
            minlength: 6
          },
          "confirm": {
            equalTo: "#password",
            minlength: 6
          },
          "email":{
            required:true,
            email:true,
          }
        },
        messages:{
          "name": {
            required: "Vui lòng nhập tên tài khoản",
            minlength: "Phải nhập 3 kí tự trở lên",
            maxlength: "Độ dài tối đa 30 kí tự",
          },
          "password": {
            required: "Vui lòng nhập tên mật khẩu",
            minlength: "Phải nhập 6 kí tự trở lên"
          },
          "confirm": {
            equalTo: "Mật khẩu xác nhận không đúng",
            minlength: "Phải nhập 3 kí tự trở lên"
          },
          "email":{
            required:"Vui lòng nhập email",
            email:"Không đúng định dạng email",
          }
        }
      });
    });
</script>


