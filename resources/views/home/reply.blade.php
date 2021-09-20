@extends('index')
@section('content')
 <style>
   .btn{
     color: white;
   }
 </style>
  <!-- Section: Details -->
  <section class="section section-Details grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12 m6">
                  <span class="card-title">Viết bài</span>
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
                
                <form action="home/reply/{{$user->id}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <div class="form-group">
                    <label>Vùng miền</label><br>
                    <select class="form-control" name="VungMien" id="vungmien">
                        @foreach ($vungmien as $vm)
                            <option value="{{$vm->id}}">{{$vm->Ten}}</option>
                        @endforeach
                    </select>
                  </div>
  
                  <div class="form-group">
                    <label>Đặc điểm</label><br>
                    <select class="form-control" name="DacDiem" id="dacdiem"> 
                        @foreach ($dacdiem as $dd)
                            <option value="{{$dd->id}}">{{$dd->Ten}}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="input-field">
                    <label for="title">Tiêu Đề</label><br>
                    <input type="text" id="tieude" value="" name="tieude">                
                  </div>
                  <div class="input-field">
                    <label for="tomtat">Tóm Tắt</label><br>
                    <input type="text" id="tomtat" value="" name="tomtat">                
                  </div>
                  <div class="input-field">
                    <label for="hinhanh">Image</label><br><br>
                    <input type="file" id="hinhanh" name="hinhanh" class="form-control" />                
                  </div>
                  <div class="input-field">
                    <label for="ckeditor">Nội dung</label><br><br>
                    <textarea class="textarea" id="ckeditor" name="noidung" style="width: 700px; height: 200px; "></textarea>              
                  </div>
                  <div class="input-field">
                    <label for="tacgia">Tên tài khoản người dùng</label><br>
                    <input type="text" id="tacgia" value="" name="tacgia">                
                  </div>
                  
  
                  <div class="card-action">
                    <button class="btn green">Đăng</button>
                    <button class="btn green"><a href="home.postCulinary">Review Món Ăn</a> </button>
                    <button class="btn green"><a href="home.postVid"> Video</a></button>
                    <button class="btn red">Xoá</button>
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
  


  
