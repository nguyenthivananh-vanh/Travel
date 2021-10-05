@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">  
    <section class="section section-posts lighten-4 content">
        <div class="container-fuild content">
            <div class=" pb-0">
                <div class="row title">
                    <div class="col-2">
                        <h5 class="card-title">Users</h5>
                    </div>
                    <div class="col-7"></div>
                    <div class="col-2">
                        <div class="search-container">
                            <form action="admin/user/search/{{$user->id}}" method="POST" enctype="multipart/form-data">
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
                        <button class="btn-add"><a href="admin/user/add/{{$user->id}}"> <i class="fas fa-plus"></i>Thêm</a></button>                              
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
                            <th>Avatar</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Phân quyền</th>
                            <th>Tác vụ</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($User as $users)

                            <tr>
                                <td>{{$users->id}}</td>
                                <td width="70">
                                    <img src="upload/users/{{$users->Avatar}}" alt=""
                                            class="responsive-img circle" style="width:50px; height:50px;object-fit: cover;margin-left: 10px;" class="circle avatar-user">
                                </td>
                                <td>{{$users->Ten}}</td>
                                <td>{{$users->email}}</td>
                                <td>
                                    @if($users->PhanQuyen==1)
                                        {{"admin"}}
                                    @else
                                        {{"user"}}
                                    @endif
                                </td>
                                <td>
                                    <a href="admin/user/level/{{$users->id}}/{{$user->id}}" class="green-text">
                                        <i class="fas fa-user-shield"></i>
                                    </a>
                                    <a href="admin/user/delete/{{$users->id}}/{{$user->id}}" class="red-text">
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
                {{$User->links("pagination::bootstrap-4")}}
            </div>
                    
                
            
        </div>
    </section>

@endsection


