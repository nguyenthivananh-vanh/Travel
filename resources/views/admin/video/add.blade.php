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

                <form action="admin/video/add" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <div class="form-group">
                    <label>Địa điểm</label><br>
                    <select class="form-control" name="DiaDiem" id="diadiem">
                        @foreach ($diadiem as $dd)
                            <option value="{{$dd->id}}">{{$dd->TieuDe}}</option>
                        @endforeach
                    </select>
                  </div>

                 
                  <div class="input-field">
                    <label for="title">Tiêu Đề</label><br>
                    <input type="text" id="tieude" value="" name="tieude">
                  </div>
                
                  <div class="input-field">
                    <label for="video">Video</label><br><br>
                    <input type="file" id="video" name="video" class="form-control" />
                  </div>
                  <div class="input-field">
                    <label for="ckeditor">Mô tả</label><br><br>
                    <textarea class="textarea" id="ckeditor" name="mota" style="width: 700px; height: 200px; "></textarea>
                  </div>
                  
                  <div class="card-action">
                    <button class="btn green">Add</button>
                    <button class="btn red">Reset</button>



                    <button  type="button" class="btn btn-success" style="color: white" onClick="createNews()">Thêm</button>
                  <button  type="button" class="btn btn red" style="color: white" onClick="deleteNews()">Reset</button>
                  </div>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="deleteDiaDiem" class="modal-view"> 
        <div class="modal-content"style="width:500px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn xóa bài viết không?</h5>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="document.getElementById('deleteDiaDiem').style.display='none'" class="cancelbtn">Quay lại</button>
            <button class="btn red" style="color: white">Xoá</button>
            </div>
            </div>
            </div>
        </div>


        <!-- Modal Edit -->
        <div id="addDiaDiem" class="modal-view" style="z-index:10;"> 
            <div class="modal-content"style="width:500px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn thêm không?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  onclick="document.getElementById('addDiaDiem').style.display='none'" class="cancelbtn">Đóng</button>
                    <button class="btn green" style="color: white">Cập nhật</button>
        
                </div>
            </div>
        </div>
  @endsection
  @section('script')
    <script>
        var deleteDiaDiemModal = document.getElementById("deleteDiaDiem");
        var addDiaDiemModal = document.getElementById("addDiaDiem");
        function deleteNews(){
            document.getElementById('deleteDiaDiem').style.display='block';
        
        }
        function createNews(){
            document.getElementById('addDiaDiem').style.display='block';
        
        }

        window.onclick = function(event) {
            if (event.target == deleteDiaDiemModal || event.target == addDiaDiemModal) {
                document.getElementById('deleteDiaDiem').style.display = "none";
                document.getElementById('addDiaDiem').style.display = "none";
            }
        }


        
    </script>
@endsection


