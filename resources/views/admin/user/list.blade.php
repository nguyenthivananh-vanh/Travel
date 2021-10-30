@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <section class="section section-posts lighten-4 content">
        <div class="container-fuild content">
            <div class=" pb-0">
                <div class="header__pc">
                    <div class="row title">
                        <div class="col-2">
                            <h5 class="card-title">Users</h5>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-7">
                            <div class="row task" style="border-bottom: none">
                                <div class="text-right">
                                    <button class="btn-add"><a href="admin/user/add/{{ $user->id }}"> <i
                                                class="fas fa-plus"></i>Thêm</a></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <div class="row task" style="border-bottom: none">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn bg-blue" style="background-color: #1976d2; color:white">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <form action="admin/user/search/{{ $user->id }}" method="POST" enctype="multipart/form-data"
                                style="width:95%">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input class="form-control" type="text" placeholder="Search.." name="search">

                            </form>
                        </div>
                    </div>
                </div>
                <div class="header__mobile">
                    <div class="row title">
                        <div class="col-lg-1 col-md-1 col-sm-1 header__mobile-navbar">
                            <label for="header__mobile-input" class="header__mobile--btn" onclick="checkbar()">
                                <i class="fas fa-bars"></i>
                            </label>
                        </div>
                        <div class="col-lg-1 col-md-1  col-sm-2 header__mobile-navbar">
                            <span class="header__home"><a href="home/home/{{ $user->id }}"><i
                                        class="fas fa-home"></i></a></span>
                        </div>

                        <div class="col-lg-7 col-md-6  col-sm-4 header__mobile-empty"></div>
                        <div class="col-lg-3 col-md-4  col-sm-5 header__mobile-search">
                            <div class="search-container">
                                <form action="admin/diadiem/search/{{ $user->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input style="border: 1px solid #ddd; border-radius: 3px;padding-left: 10px" type="text"
                                        placeholder="Search.." name="search" id="search">
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="row task">
                        <div class="col-lg-2 col-md-2  col-sm-3 header__mobile-5">
                            <h5 class="card-title">Users</h5>
                        </div>
                        <div class="col-lg-7 col-md-6  col-sm-4 no-empty"></div>
                        <div class="col-lg-3 col-md-4  col-sm-5  task-button header__mobile-5">
                            <button class="btn-add"><a href="admin/diadiem/add/{{ $user->id }}"> <i
                                        class="fas fa-plus"></i>Thêm</a></button>
                        </div>
                    </div>
                </div>

                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}<br>
                    </div>
                @endif
                <div class="row">
                    <div class="card-body col-lg-12" style="overflow-x:auto;">
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
                                        <td>{{ $users->id }}</td>
                                        <td width="70">
                                            <img src="upload/users/{{ $users->Avatar }}" alt=""
                                                class="responsive-img circle"
                                                style="width:50px; height:50px;object-fit: cover;margin-left: 10px;"
                                                class="circle avatar-user">
                                        </td>
                                        <td>{{ $users->Ten }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            @if ($users->PhanQuyen == 1)
                                                {{ 'admin' }}
                                            @else
                                                {{ 'user' }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="admin/user/level/{{ $users->id }}/{{ $user->id }}"
                                                class="green-text">
                                                <i class="fas fa-user-shield"></i>
                                            </a>
                                            <a href="admin/user/delete/{{ $users->id }}/{{ $user->id }}"
                                                class="red-text">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="page">
                {{ $User->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
