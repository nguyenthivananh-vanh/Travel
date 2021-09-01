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
                                    <span class="card-title">Đặc Điểm</span>
                                </div>
                                <div class="col-6 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/dacdiem/add">Thêm</a></button>
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
                        <div id="search" class="section section-search teal darken-2 white-text center scrollspy">
                            <div class="container">
                                <div class="row">
                                    <div class="col s12">
                                        <h3>Tra cứu hình thức du lịch </h3>
                                        <form action="admin/dacdiem/search" method="POST" enctype="multipart/form-data">
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
                            {{$dacdiem->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

