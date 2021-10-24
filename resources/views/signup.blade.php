@include('index')
<link href="admin_asset/css/login.css" rel="stylesheet">
  <div class="login-page bg fadeInDown">
    <div class="overlay"></div>
    <div class="form">
      <div class="form-login">
        <h4 style="color:#1976d2;">Đăng ký</h4>
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
          <form action="register" method="POST" enctype="multipart/form-data">   
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <div class="form-group row">
                <input type="text" class="form-control pl-2" id="name" name="ten" aria-describedby="nameHelp" placeholder="Enter name" style="text-align:left;"  required>
              </div>
              <div class="form-group row">
                <input type="email" class="form-control pl-2" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" require>
              </div>
              <div class="form-group row">
                <input type="password" class="form-control pl-2" id="password" name="pass" placeholder="Password" require>
              </div>
              <div class="form-group row">
                <input type="password" class="form-control pl-2" id="password_rp" name="confirm" placeholder="Confirm Password" require>
              </div>
          
              <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
              <br/>
              @if($errors->has('g-recaptcha-response'))
              <span class="invalid-feedback" style="display:block">
                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
              </span>
              @endif
              <button type="submit"style="border-radius:5px">Đăng ký</button>
            </form>
          </div>
      </div>
    </div>
  </section>



  <footer class="section blue darken-2 white-text center" style="position: absolute;bottom: 0;left: 0; right: 0;">
    <p>My Vietnam Copyright &copy; 2021</p>
  </footer> -->

  <div class="login-page bg fadeInDown">
    <div class="overlay"></div>
    <div class="form">
      <div class="form-login">
        <h4 style="color:#1976d2;">Đăng ký</h4>
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
    <form action="register" method="POST" enctype="multipart/form-data" id="myForm">   
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="form-group row">
          <input type="text" class="form-control pl-2" id="name" name="ten" aria-describedby="nameHelp" placeholder="Enter name" style="text-align:left;"  required>
        </div>
        <div class="form-group row">
          <input type="email" class="form-control pl-2" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" require>
        </div>
        <div class="form-group row">
          <input type="password" class="form-control pl-2" id="password" name="pass" placeholder="Password" require>
        </div>
        <div class="form-group row">
          <input type="password" class="form-control pl-2" id="password_rp" name="confirm" placeholder="Confirm Password" require>
        </div>
        <div>
          <p style="float: right;margin-bottom: 20px; color: #1976d1"  onClick="reset()" class="mr-2">Reset</p>
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
        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
        <br/>
        @if($errors->has('g-recaptcha-response'))
        <span class="invalid-feedback" style="display:block">
          <strong>{{$errors->first('g-recaptcha-response')}}</strong>
        </span>
        @endif
        <button type="submit"style="border-radius:5px">Đăng ký</button>
      </form>
      </div>
    
    </div>
</div>
{{-- <script type="text/javascript">
    function processdata(){
        var name = document.getElementById('name').value;
        var pass = document.getElementById('password').value;
        var pass_rp = document.getElementById('password_rp').value;
        var format = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/;


        if (pass.toString() > pass_rp.toString() || pass.toString() < pass_rp.toString()){
            alert("Nhập lại mật khẩu không giống phía trên. Vui lòng nhập lại!");
            return false;
        } else if(pass.length < 3 || pass.length > 32){
            alert("Password phải lớn hơn 3 kí tự và nhỏ hơn 32 kí tự")
        } else if (name.match(format)){
            alert("Không chứa kí tự đặc biệt trong tên");
        }
    }
</script> --}}
<script>
  function reset(){
      document.getElementById("myForm").reset();
    }
</script>
    
