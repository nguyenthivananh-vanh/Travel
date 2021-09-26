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
                    <!-- <button class="btn green">Đăng</button> -->
                    <button class="btn green"><a href="home.postCulinary">Review Món Ăn</a> </button>
                    <button class="btn green"><a href="home.postVid"> Video</a></button>
                    <button type="button" class="btn btn-success" id="btnPost" onClick="post()">Post</button>
                    <button type="button" class="btn btn red" id="btnDelete" onClick="popUpDelete()">
                      Delete
                  </button>
                  
                  </div>
                 
                </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
<!-- Modal Delete -->

<div id="id01" class="modal-view">
  <!-- <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span> -->
  <!-- <form class="modal-content" action="/action_page.php">
    <div class="text-content">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
      </div>
    </div>
  </form> -->
  <div class="modal-content"style="width:500px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
      </div>
      <!-- <div class="modal-body">
        Bạn có chắc là muốn xóa?
      </div> -->
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" class="btn btn red" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
      </div>
      </div>
    </div>
</div>
<!-- Modal Post-->
<div id="modalPost" class="modal-view">
  <div class="modal-content"style="width:500px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bạn có muốn đăng không?</h5>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary"  onclick="document.getElementById('modalPost').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" class="btn btn red" onclick="document.getElementById('modalPost').style.display='none'" class="deletebtn">Post</button>
      </div>
      </div>
    </div>
</div>






  </section>
  @endsection
  @section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
  <script src="admin_asset/js/homepage.js"></script>
  <script>
    $('.addAttr').click(function() {
  var id = $(this).data('id');   
  $('#id').val(id); 
  } );
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


  


  
