@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">  
    <section class="section section-posts lighten-4 content">
        <div class="container-fuild content">
            <div class=" pb-0">
                <div class="row title">
                    <div class="col-2">
                        <h5 class="card-title">Đặc điểm</h5>
                    </div>
                    <div class="col-7"></div>
                    <div class="col-2">
                        <div class="search-container">
                            <form action="admin/dacdiem/search/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input
                                    style="border: 1px solid #ddd; border-radius: 3px;padding-left: 10px"
                                    type="text" placeholder="Search.." name="search">
                                    
                            </form>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row task" >
                    <div class="col-9"></div>
                    <div class="col-3 " >
                        <button class="btn-add"><a href="admin/dacdiem/add/{{$user->id}}"> <i class="fas fa-plus"></i>Thêm</a></button>                                                  
                    </div> 
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                <div class="card-body" >
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr style="text-align:center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Tên Không Dấu</th>
                            <th>Vùng Miền</th>
                            <th>Tác vụ</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dacdiem as $dd)
                        <tr style="text-align:center">
                            <td>{{$dd->id}}</td>
                            <td>{{$dd->Ten}}</td>
                            <td>{{$dd->TenKhongDau}}</td>
                            <td>{{$dd->vungmien->Ten}}</td>
                            <td >
                                <a href="admin/dacdiem/update/{{$dd->id}}/{{$user->id}}" class="green-text">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="admin/dacdiem/delete/{{$dd->id}}/{{$user->id}}" class="red-text">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>
                  </div>
              
            </div>
            <div class="page">
                {{$dacdiem->links("pagination::bootstrap-4")}}
            </div>
                    
                
            
        </div>
    </section>

@endsection



