@include('layout.index')
<nav class="blue darken-2">
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
  
  
  <!-- Footer -->
  <footer class="section blue darken-2 white-text center" style="position: absolute;bottom: 0;left: 0; right: 0;">
    <p>My Vietnam Copyright &copy; 2021</p>
  </footer>
