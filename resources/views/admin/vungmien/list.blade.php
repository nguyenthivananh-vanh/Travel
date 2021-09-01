@extends('admin.layout.index')

@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <section class="section section-users grey lighten-4 content">
        <div class="container-admin">
            <div class="row">
                <div>
                    <div class="card">

                        <div class="card-content pb-0">
                            <div class="row">
                                <div class="col-6">
                                    <span class="card-title">Vùng Miền</span>
                                </div>
                                <div class="col-6 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/vungmien/add">Thêm</a></button>
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
                                    <th>Tác vụ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($vungmien as $vm)
                                    <tr>
                                        <td>{{$vm->id}}</td>
                                        <td>{{$vm->Ten}}</td>
                                        <td>{{$vm->TenKhongDau}}</td>
                                        <td>
                                            <a href="admin/vungmien/update/{{$vm->id}}" class="green-text">
                                                <i class="material-icons">done</i>
                                            </a>
                                            <a href="admin/vungmien/delete/{{$vm->id}}" class="red-text">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="page">
                            {{$vungmien->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
