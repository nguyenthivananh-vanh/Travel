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
              
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                
              <form action="admin/user/level/{{$user->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <label for="">Phân quyền</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0">
                  <label class="form-check-label" for="inlineRadio1">User</label>
                </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
                <label class="form-check-label" for="inlineRadio2">Admin</label>
              </div> 
              </div>    
                <div class="card-action">
                  <button class="btn green">Save</button>
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


  