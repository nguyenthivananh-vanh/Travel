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

                <form action="admin/video/update/{{$video->id}}/{{$user->id}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <div class="form-group">
                    <label>Địa điểm</label><br>
                    <select class="form-control" name="DiaDiem" id="diadiem">
                        @foreach ($diadiem as $dd)
                            <option 
                            @if($video->idDiaDiem== $dd->id)
                                {{"selected"}}
                            @endif
                            value="{{$dd->id}}">{{$dd->TieuDe}}</option>
                        @endforeach
                         
                      </select>
                  </div>

                 
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
                    <button class="btn green">Update</button>
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




