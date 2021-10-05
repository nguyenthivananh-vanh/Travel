@extends('index')
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
                  <span class="card-title">Video</span>
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

                <form action="home/updateVideo/{{$id}}/{{$tacgia}}/{{$idUser}}/{{$video->id}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  

                 
                  <div class="input-field">
                    <label for="title">Tiêu Đề</label><br>
                    <input type="text" id="tieude" value="{{$video->TieuDe}}" name="tieude">
                  </div>
                
                  <div class="input-field">
                    <label for="video">Video</label><br><br>
                    <video height="200px" controls>
                        <source src="upload/video/{{$video->video}}"   >
                    </video>
                    <input type="file" id="video" name="video" class="form-control" />
                  </div>
                  <div class="input-field">
                    <label for="ckeditor">Mô tả</label><br><br>
                    <textarea class="textarea" id="ckeditor" name="mota" style="width: 700px; height: 200px; ">{{$video->Mota}}</textarea>
                  </div>
                  
                  <div class="card-action">
                    <!-- <button class="btn green">Update</button>
                    <button class="btn red">Reset</button> -->
                    <button  type="button" class="btn btn-success" style="color: white" onClick="editUpdateVideo()">Cập nhật</button>
                    <button  type="button" class="btn btn red" style="color: white" onClick="deleteUpdateVideo()">Xoá</button>

                  </div>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div id="deleteEditVideo" class="modal-view"> 
        <div class="modal-content"style="width:500px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn xóa cập nhập không?</h5>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="document.getElementById('deleteEditVideo').style.display='none'" class="cancelbtn">Quay lại</button>
                <button type="button" class="btn btn red" class="deletebtn">Xóa bài</button>
            </div>
            </div>
            </div>
        </div>


        <!-- Modal Edit -->
        <div id="saveEditVideo" class="modal-view" style="z-index:10;"> 
        <div class="modal-content"style="width:500px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn cập nhập không?</h5>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary"  onclick="document.getElementById('saveEditVideo').style.display='none'" class="cancelbtn">Đóng</button>
        <button type="button" class="btn btn red"  class="deletebtn">Lưu</button>
      </div>
      </div>
    </div>
  </section>
  @endsection

  @section('script')
  <script>
     <script type="text/javascript" src="admin_asset/js/homepage.js"></script>

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




