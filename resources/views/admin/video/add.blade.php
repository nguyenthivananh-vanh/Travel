@extends('admin.layout.index')
@section('content')
<link type="text/css" rel="stylesheet" href="admin_asset/css/materialize.min.css" media="screen,projection" />
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

                <form action="admin/video/add/{{$user->id}}" method="POST" enctype="multipart/form-data">
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
                    <button class="btn green">Thêm</button>
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


