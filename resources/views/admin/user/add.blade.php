@extends('admin.layout.index')
@section('content')
 
  <!-- Section: Details -->
  <section class="section section-Details grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12 m6">
                  <span class="card-title">User</span>
                  
                </div>
                
              </div>
              @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                
              <form action="admin/user/add" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                
                <div class="input-field">
                  <label >Tên tài khoản</label><br>
                  <input type="text" id="ten" value="" name="ten">                
                </div>
                <div class="input-field">
                  <label >Email</label><br>
                  <input type="email" id="mail" value="" name="email">                
                </div>
                
                
                <div class="input-field">
                  <label >Password</label><br>
                  <input type="password" id="pass" value="" name="pass">                
                </div>
                <div class="input-field">
                  <label >Nhập lại Password</label><br>
                  <input type="password" id="confirm" value="" name="confirm">                
                </div>
                <div class="input-field">
                  <label for="hinhanh">Avatar</label><br><br>
                  <input type="file" id="hinhanh" name="hinhanh" class="form-control" />     
                </div>
                <div class="input-field">
                  <label for="">Phân quyền</label><br><br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="phanquyen" id="inlineRadio1" value="0">
                    <label class="form-check-label" for="inlineRadio1">User</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="phanquyen" id="inlineRadio2" value="1">
                    <label class="form-check-label" for="inlineRadio2">Admin</label>
                  </div> 
              </div>
              <div class="input-field">
                
              </div>
              
                
                <div class="card-action">
                  <button class="btn green">Add</button>
                  <button class="btn red">Reset</button>
                </div>
              </form>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  @section('script')
    <script>
       
        $(document).ready(function(){
            $("#vungmien").change(function(){
                var idvm = $(this).val();
                $.get("admin/ajax/dacdiem/"+idvm,function(data){
                    $("#dacdiem").html(data);
                });
            });
        });
    </script>
@endsection


  