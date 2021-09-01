@include('index')
<!-- include nay la gi nhi -->
<!-- <nav class="blue darken-2">
    <div class="container">
      <div class="nav-wrapper">
        <a href="index.html" class="brand-logo">Admin</a>
      </div>
    </div>
  </nav>

  <section class="section section-login"  >
    <div class="container" >
      <div class="row" style="margin-left: 0;">
          <div class="card-panel login blue darken-2 white-text center">
            <h2>Sign up for Free</h2>
            <form>
            <div class="form-group row">
                <label for="staticName" class="col-sm-2 col-form-label" style="color: white;">Name: </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter name" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white;">Email: </label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label" style="color: white;">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPsdRepeat" class="col-sm-2 col-form-label" style="color: white;">Repeat Password: </label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="exampleInputPsdRepeat1" placeholder="Repeat Password" required>
                </div>
              </div>

              <button type="submit" class="btn btn-primary" style="background-color: #9e9e9e!important;">Register</button>
            </form>
          </div>
      </div>
    </div>
  </section>



  <footer class="section blue darken-2 white-text center" style="position: absolute;bottom: 0;left: 0; right: 0;">
    <p>My Vietnam Copyright &copy; 2021</p>
  </footer> -->

  <div class="login-page">

    <div class="form">
    <h3>Sign up</h3>
      <form action="{{URL('register')}}" method="POST" onsubmit="return processdata()">
      @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group row">
        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter name" required>
        </div>
        <div class="form-group row">
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" require>
        </div>
        <div class="form-group row">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" require>
        </div>
        <div class="form-group row">
          <input type="password" class="form-control" id="password_rp" name="password_rp" placeholder="Repeat Password" require>
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
        <button type="submit" >Submit</button>
      </form>
    </div>
</div>
<script type="text/javascript">
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
</script>
