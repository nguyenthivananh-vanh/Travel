@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <section class="section section-posts grey lighten-4 content">
        <div class="container-admin">
            <div class="row">
                <div>
                    <div class="card">
                        <div class="card-content pb-0">
                            <div class="row">
                                <div class="col-2">
                                    <span class="card-title">Món ăn</span>
                                </div>
                                <div class="col-4">
                                    <div class="search-container">
                                        <form action="admin/monan/search" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            <input
                                                style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px"
                                                type="text" placeholder="Search.." name="search" id="search">
                                        </form>
                                    </div>
                                </div>
                              
                                <div class="col-2 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/monan/add">Thêm</a></button>
                                </div>
                            </div>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}<br>
                                </div>
                            @endif
                            <br><br>
                            <div class="table table-responsive">
                                <table style="border-collapse: collapse;" class="table striped">
                                    <thead>
                                    <tr>
                                        <th style=" border: 1px solid #ddd;">Id</th>
                                        <th style=" border: 1px solid #ddd;">Tên Món Ăn</th>
                                        <th style=" border: 1px solid #ddd;">Tiêu đề</th>
                                        <th style=" border: 1px solid #ddd;">Mô Tả</th>
                                        <th style=" border: 1px solid #ddd;">Hình ảnh</th>
                                        <th style=" border: 1px solid #ddd;">Địa điểm</th>
                                        <th style=" border: 1px solid #ddd;">Tác vụ</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($MonAn as $monan)
                                            <tr>
                                                <td style=" border: 1px solid #ddd;">{{$monan->id}}</td>
                                                <td style=" border: 1px solid #ddd;">{{$monan->TenMonAn}}</td>
                                                <td style=" border: 1px solid #ddd;">{{$monan->TieuDe}}</td>
                                                <td style=" display: block;
                                                display: -webkit-box;
                                                width: 100px;
                                                height: 116px;
                                                margin: 0 auto;
                                                font-size: 14px;
                                                line-height: 1.5;
                                                -webkit-line-clamp: 5
                                                -webkit-box-orient: vertical;
                                                overflow: hidden;
                                                text-overflow: ellipsis;">{{$monan->MoTa}}</td>
                                                <td style=" border: 1px solid #ddd;">
                                                    <img src="upload/monan/{{$monan->HinhAnh}}" alt="img"
                                                         width="100px">
                                                </td>
                                                <td style=" border: 1px solid #ddd;">{{$monan->diadiem->TieuDe}}</td>
                                                
                                                <td style=" border: 1px solid #ddd;">
                                                    <a href="admin/monan/update/{{$monan->id}}" class="green-text">
                                                        <i class="material-icons">done</i>
                                                    </a>
                                                    <a href="admin/monan/delete/{{$monan->id}}" class="red-text">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                </td>
                                            </tr>
                                        

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="page">
                            {{$MonAn->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
