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
                            <h5 class="card-title">Địa điểm</h5>
                        </div>
                        <div class="col-7"></div>
                        <div class="col-2 text-right">
                            <div class="search-container">
                                <form action="admin/diadiem/search/{{ $user->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input style="border: 1px solid #ddd; border-radius: 3px;padding-left: 10px" type="text"
                                        placeholder="Search.." name="search">

                                </form>
                            </div>
                        </div>
                        <div class="col-1"></div>
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
                                    <th>Id</th>
                                    <th>Tiêu đề</th>
                                    <th>Tóm tắt</th>
                                    <th>Hình ảnh</th>
                                    <th>Nội Dung</th>
                                    <th>Tác giả</th>
                                    <th class="view" style="width:7%">Số lượt xem</th>
                                    <th>Đặc điểm</th>
                                    <th class="province">Tỉnh thành</th>
                                    <th class="status" style="width:7%">Trạng thái</th>
                                    <th class="tac-vu" style="width:5%">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DiaDiem as $diadiem)
                                    <tr>
                                        <td>{{ $diadiem->id }}</td>
                                        <td>{{ $diadiem->TieuDe }}</td>
                                        <td class="title__short--hidden">{{ $diadiem->TomTat }}</td>
                                        <td>
                                            <img src="upload/diadiem/{{ $diadiem->HinhAnh }}" alt="img" width="100px"
                                                class="list-image">
                                        </td>
                                        <td class="title__des--hidden">{{ $diadiem->NoiDung }}</td>
                                        <td>{{ $diadiem->TacGia }}</td>
                                        <td>{{ $diadiem->SoLuotXem }}</td>
                                        <td>{{ $diadiem->dacdiem->Ten }}</td>
                                        <td class="province">{{ $diadiem->tinh }}
                                        <td class="status">
                                            @if ($diadiem->TrangThai == 1)
                                                {{ 'Đã duyệt' }}
                                            @else
                                                {{ 'Chưa duyệt' }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="admin/diadiem/view/{{ $diadiem->id }}/{{ $diadiem->TacGia }}/{{ $user->id }}"
                                                class="green-text">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="admin/diadiem/delete/{{ $diadiem->id }}/{{ $user->id }}"
                                                class="red-text">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a class="view--hidden"
                                                href="admin/diadiem/view/{{ $diadiem->id }}/{{ $diadiem->TacGia }}"><i
                                                    class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="page">
                {{ $DiaDiem->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
