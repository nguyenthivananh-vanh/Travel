@extends('admin.layout.index')
@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
<section class="section section-users grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Đặc Điểm</span>
              <button class="btn-add"><a href="admin/dacdiem/add">Thêm</a></button>
              @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
              <table class="striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tên Không Dấu</th>                
                    <th>Vùng Miền</th>                
                    <th>Tác vụ</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dacdiem as $dd)
                        <tr>
                            <td>{{$dd->id}}</td>
                            <td>{{$dd->Ten}}</td>
                            <td>{{$dd->TenKhongDau}}</td>                          
                            <td>{{$dd->vungmien->Ten}}</td>                          
                            <td>
                              <a href="admin/dacdiem/update/{{$dd->id}}" class="green-text">
                                <i class="material-icons">done</i>
                              </a>
                              <a href="admin/dacdiem/delete/{{$dd->id}}" class="red-text">
                                <i class="material-icons">close</i>
                              </a>
                            </td>
                        </tr>                      
                    @endforeach
                    
                </tbody>

              </table>
            </div>
            <div class="page">
              {{$dacdiem->links("pagination::bootstrap-4")}}
            </div>
           
            
          </div>
        </div>
      </div>
    </div> 
  </section>
  @endsection

  