@include('index')
<link href="admin_asset/css/login.css" rel="stylesheet">


<div class=" bg">
    <div class="overlay"></div>
    <div class="form fadeInDown">
        <div class=" form-login">
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
            <form action="login" method="POST" enctype="multipart/form-data" id="myForm">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group row">
                    <input  type="email" class="form-control pl-1" id="email" name="email" aria-describedby="emailHelp"
                           placeholder="Enter email" require>
                </div>
                <div class="form-group row">
                    <input type="password" class="form-control pl-1" id="password" name="password" placeholder="Password"
                           require>
                </div>
                <div>
                    <a style="float: right;margin-bottom: 20px;" href="forgotPassWord">Quên mật khẩu ?</a>
                    <p style="float: right;margin-bottom: 20px; color: #1976d1"  onClick="reset()" class="mr-2">Reset</p>

                </div>
              <br>
              <br>
                {{-- <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br/>
                @if($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                    </span>
                @endif --}}
    
                <button type="submit">Đăng nhập</button>
            </form>
        </div>
    </div>
   
</div>
<!-- <div class="wrapper fadeInDown">
  <div id="formContent">
   
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

  
    <form>
      <input type="text" id="login" class="fadeInput second style-input" name="login" placeholder="login">
      <input type="text" id="password" class="fadeInput third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

   
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div> -->
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
    function reset(){
      document.getElementById("myForm").reset();
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




