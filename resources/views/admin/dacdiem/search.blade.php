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
                                    <span class="card-title">Đặc Điểm</span>
                                </div>
                                <div class="col-4">
                                    <div class="search-container">
                                        <form action="admin/dacdiem/search" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            <input
                                                style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px"
                                                type="text" placeholder="Search.." name="search">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-4 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/diadiem/add">Thêm</a></button>
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
                        <div class="page">
                            {{$dacdiem->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

