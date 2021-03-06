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
                        <div class="col-6">
                            <h5 class="card-title">Vùng miền</h5>
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

                        </div>
                    </div>
                    <div class="row task">
                        <div class="col-lg-12 col-md-12  col-sm-12 ">
                            <h5 class="card-title">Vùng miền</h5>
                        </div>
                    </div>
                </div>
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}<br>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style="text-align:center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Tên Không Dấu</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vungmien as $vm)
                                <tr style="text-align:center">
                                    <td>{{ $vm->id }}</td>
                                    <td>{{ $vm->Ten }}</td>
                                    <td>{{ $vm->TenKhongDau }}</td>
                                    <td>
                                        <a href="admin/vungmien/update/{{ $vm->id }}/{{ $user->id }}"
                                            class="green-text">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="admin/vungmien/delete/{{ $vm->id }}/{{ $user->id }}"
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
            <div class="page">
                {{ $vungmien->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
