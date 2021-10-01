@include('index')


<div class="login-page">
    <div class="form form-login">
        <h2 style="color:#1976d2;">Đăng nhập</h2>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <form action="login" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group row">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                       placeholder="Enter email" require>
            </div>
            <div class="form-group row">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                       require>
            </div>
            <div>
                <a style="float: right;margin-bottom: 20px;" href="forgotPassWord">Quên mật khẩu</a>
            </div>
          
            <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}">
            </div>
            <br/>
            @if($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style="display:block">
        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
      </span>
            @endif

            <button type="submit">Đăng nhập</button>
        </form>
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
</script>
<!-- <form>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white;">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label" style="color: white;">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me!</label>
              </div>
              <button type="submit" class="btn btn-primary" style="background-color: #9e9e9e!important;">Submit</button>
            </form> -->




