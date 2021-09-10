@extends('admin.layout.index')

@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <section class="section section-users grey lighten-4 content">
        <div class="container-admin">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-4">
                                    <span class="card-title">User</span>
                                </div>
                                <div class="col-4">
                                    <div class="search-container">
                                        <form action="admin/user/search" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            <input
                                                style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px"
                                                type="text" placeholder="Search.." name="search">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-4 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/user/add">Thêm</a></button>
                                </div>
                            </div>
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
                                            <img src="upload/users/{{$user->Avatar}}" alt=""
                                                 class="responsive-img circle" style="width:50px; height:50px;object-fit: cover;margin-left: 10px;" class="circle avatar-user">
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
