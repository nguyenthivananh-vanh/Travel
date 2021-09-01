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
                                <div class="col-6">
                                    <span class="card-title">Users</span>
                                </div>
                            </div>
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
                                                 class="responsive-img circle" style="width: 40px; margin-left: 10px;">
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
                        <div id="search" class="section section-search teal darken-2 white-text center scrollspy">
                            <div class="container">
                                <div class="row">
                                    <div class="col s12">
                                        <h3>Tra cứu tài khoản người dùng </h3>
                                        <form action="admin/user/search" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token"
                                                   value="OUcioC7MRF5kIBtzz5NMoxWy7JPEpGE30GbMUvth">
                                            <div class="search">
                                                <div class="input-field input__search">
                                                    <input type="text" style="padding-left: 12px"
                                                           class="white grey-text autocomplete" placeholder="Tìm kiếm"
                                                           id="autocomplete-input" name="search">
                                                </div>
                                                <button type="submit" class="btn_search--submit" style="color: black">
                                                    Search
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

