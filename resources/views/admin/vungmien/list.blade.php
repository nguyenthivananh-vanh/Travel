@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <section class="section section-posts lighten-4 content">
        <div class="container-fuild content">
            <div class=" pb-0">
                <div class="row title">
                    <div class="col-12">
                        <h5 class="card-title">Vùng miền</h5>
                    </div>

                </div>
                <div class="row task">
                    <div class="col-9"></div>
                    <div class="col-3 ">
                        <button class="btn-add"><a href="admin/vungmien/add/{{$user->id}}"> <i class="fas fa-plus"></i>Thêm</a>
                        </button>
                    </div>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
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
                                <td>{{$vm->id}}</td>
                                <td>{{$vm->Ten}}</td>
                                <td>{{$vm->TenKhongDau}}</td>

                                <td>
                                    <a href="admin/vungmien/update/{{$vm->id}}/{{$user->id}}" class="green-text">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="admin/vungmien/delete/{{$vm->id}}/{{$user->id}}" class="red-text">
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
                {{$vungmien->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </section>
@endsection
