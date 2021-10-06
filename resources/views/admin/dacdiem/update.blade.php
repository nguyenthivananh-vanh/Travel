@extends('admin.layout.index')
@section('content')
<link type="text/css" rel="stylesheet" href="admin_asset/css/materialize.min.css" media="screen,projection" />
  <!-- Section: Details -->
  <section class="section section-Details grey lighten-4">
    <div class="">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12 m6">
                  <span class="card-title">Đặc điểm</span>
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
              <form action="admin/dacdiem/update/{{$dacdiem->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="form-group">
                  <label>Vùng miền</label>
                 
                  <select class="form-control" name="VungMien" id="vungmien">
                    @foreach ($vungmien as $vm)
                        <option 
                        @if($dacdiem->idVungMien== $vm->id)
                            {{"selected"}}
                        @endif
                        value="{{$vm->id}}">{{$vm->Ten}}</option>
                    @endforeach
                     
                  </select>
              </div>
                <div class="input-field">
                    <label for="title">Ten</label><br>
                  <input type="text" id="title" value="{{$dacdiem->Ten}}" name="ten">                
                </div>
                <div class="card-action">
                  <button class="btn green">Cập nhật</button>
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


  