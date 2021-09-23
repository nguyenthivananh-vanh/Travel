@include('index')
<!-- <nav class="blue darken-2">
    <div class="container">
      <div class="nav-wrapper">
        <a href="index.html" class="brand-logo">My VietNam Admin</a>
      </div>
    </div>
  </nav>

  <section class="section section-login"  style="margin:120px auto;">

    <div class="container" style="margin-top: 100px;margin:0 auto; width: 700px;">
      <div class="row" style="margin-left: 0;">
          <div class="card-panel login blue darken-2 white-text center">
            <h2>Admin Login</h2> -->
<!-- <form>
  <div class="form-group row">
    <label for="exampleInputEmail1">Email address</label>
    <div class="col-sm-10">
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me!</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->


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
</form>
</div>
</div>
</div>
</section> -->


<!-- Footer -->
<!-- <footer class="section blue darken-2 white-text center" style="position: absolute;bottom: 0;left: 0; right: 0;">
  <p>My Vietnam Copyright &copy; 2021</p>
</footer> -->

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
            <!-- <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember me!</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div> -->
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




