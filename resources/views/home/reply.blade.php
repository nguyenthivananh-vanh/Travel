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
                  <span class="card-title">Địa điểm</span>
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
                    <input type="file" id="hinhanh" name="hinhanh" class="form-control" /><br>
                  </div>
                  <div class="input-field">
                    <label for="ckeditor">Nội dung</label><br><br>
                    <textarea class="textarea" id="ckeditor" name="noidung" style="width: 700px; height: 200px; "></textarea>
                  </div>
                  <div class="input-field">
                    <label for="tacgia">Tác giả</label><br>
                    <input type="text" id="tacgia" value="" name="tacgia">
                  </div>
                  <div class="input-field">
                    <label for="tacgia">Tỉnh thành</label><br>
                    <input type="text" id="tinh" value="" name="tinh">
                </div>

                  <div class="card-action">
                    <button class="btn btn-secondary green">Đăng bài</button>
                    <button class="btn btn-secondary red">Xóa</button> 
                      <!-- Gà Tây: đoạn này t comment hai cái nút lại và ấy lại để mở popup -->
                      {{-- <button  type="button" class="btn btn-success" style="color: white" >Đăng bài</button>
                      <button  type="button" class="btn btn red" style="color: white" >Xoá</button> --}}
                  </div>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- Modal Delete -->


        <!-- Modal Edit -->
        {{-- <div id="postNews" class="modal-view" style="z-index:10;"> 
            <div class="modal-content"style="width:500px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bạn có muốn đăng bài không?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  onclick="document.getElementById('postNews').style.display='none'" class="cancelbtn">Đóng</button>
                    <button class="btn green" style="color: white">Đăng bài</button>
                </div>
            </div>
        </div> --}}



  @endsection

  @section('script')
  <script type="text/javascript" src="admin_asset/js/homepage.js"></script>

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

  


  
