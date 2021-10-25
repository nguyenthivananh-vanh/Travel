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

<script>
  function reset(){
      document.getElementById("myForm").reset();
    }
</script>
    
