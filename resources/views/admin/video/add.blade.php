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
                  </div>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection





