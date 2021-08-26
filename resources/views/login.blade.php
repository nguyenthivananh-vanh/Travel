@include('layout.index')
<nav class="blue darken-2">
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
            <h2>Admin Login</h2>
            <form>
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
              <button type="submit" class="btn btn-primary" style="background-color: #9e9e9e!important;">Submit</button>
            </form>
          </div>
      </div>
    </div>
  </section>
  
  
  <!-- Footer -->
  <footer class="section blue darken-2 white-text center" style="position: absolute;bottom: 0;left: 0; right: 0;">
    <p>My Vietnam Copyright &copy; 2021</p>
  </footer>
