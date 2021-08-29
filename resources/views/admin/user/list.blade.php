@extends('admin.layout.index')

@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
<section class="section section-users grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Users</span>
              <button class="btn-add"><a href="admin/user/add">Thêm</a></button>
              @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
              <table class="striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Họ tên</th>
                    <th>Email</th>                  
                    <th>Phân quyền</th>                 
                    <th>Tác vụ</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($User as $user)
                   
                  <tr>
                    <td>{{$user->id}}</td>
                    <td width="70">
                      <img src="upload/users/{{$user->Avatar}}" alt="" class="responsive-img circle" style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>{{$user->Ten}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @if($user->PhanQuyen==1)
                      {{"admin"}}
                      @else
                      {{"user"}}
                      @endif
                      </td>
                    <td>
                      <a href="admin/user/level/{{$user->id}}" class="green-text">
                        <i class="fas fa-user-shield"></i>
                      </a>
                      <a href="admin/user/delete/{{$user->id}}" class="red-text">
                        <i class="material-icons">close</i>
                      </a>
                    </td>

                  </tr>
                      
                  @endforeach 
                </tbody>
              </table>
            </div>
            <div class="page">
              {{$User->links("pagination::bootstrap-4")}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection