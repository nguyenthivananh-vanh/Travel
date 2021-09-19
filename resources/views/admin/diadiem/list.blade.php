@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <section class="section section-posts grey lighten-4 content">
        <div class="container-fuild">
            <div class="row">
                <div>
                    <div class="card">
                        <div class="card-content pb-0">
                            <div class="row">
                                <div class="col-2">
                                    <span class="card-title">Địa điểm</span>
                                </div>
                                <div class="col-4">
                                    <div class="search-container">
                                        <form action="admin/diadiem/search" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            <input
                                                style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px"
                                                type="text" placeholder="Search.." name="search">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-4 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/diadiem/duyetbai">Duyệt bài</a></button>
                                </div>
                                <div class="col-2 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/diadiem/add">Thêm</a></button>
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
                                        <th style=" border: 1px solid #ddd;">Tiêu đề</th>
                                        <th style=" border: 1px solid #ddd;">Tiêu đề không dấu</th>
                                        <th style=" border: 1px solid #ddd;">Tóm tắt</th>
                                        <th style=" border: 1px solid #ddd;">Hình ảnh</th>
                                        <th style=" border: 1px solid #ddd;">Nội Dung</th>
                                        <th style=" border: 1px solid #ddd;">Nổi bật</th>
                                        <th style=" border: 1px solid #ddd;">Tác giả</th>
                                        <th style=" border: 1px solid #ddd;">Số lượt xem</th>
                                        <th style=" border: 1px solid #ddd;">Id đặc điểm</th>
                                        <th style=" border: 1px solid #ddd;">Tác vụ</th>
                                        <th style=" border: 1px solid #ddd;">Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($DiaDiem as $diadiem)

                                        @if($diadiem->TrangThai == 1)
                                            <tr>
                                                <td style=" border: 1px solid #ddd;">{{$diadiem->id}}</td>
                                                <td style=" border: 1px solid #ddd;">{{$diadiem->TieuDe}}</td>
                                                <td style=" border: 1px solid #ddd;">{{$diadiem->TieuDeKhongDau}}</td>
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
                                                            text-overflow: ellipsis;">{{$diadiem->TomTat}}</td>
                                                <td style=" border: 1px solid #ddd;">
                                                    <img src="upload/diadiem/{{$diadiem->HinhAnh}}" alt="img"
                                                         width="100px">
                                                </td>
                                                <td style="display: block;
                                                            display: -webkit-box;
                                                            width: 300px;
                                                            height: 116px;
                                                            margin: 0 auto;
                                                            font-size: 14px;
                                                            line-height: 1.5;
                                                            -webkit-line-clamp: 5;
                                                            -webkit-box-orient: vertical;
                                                            overflow: hidden;
                                                            text-overflow: ellipsis; ">{{$diadiem->NoiDung}}</td>

                                                <td style=" border: 1px solid #ddd;">{{$diadiem->NoiBat}}</td>
                                                <td style=" border: 1px solid #ddd;">{{$diadiem->TacGia}}</td>
                                                <td style=" border: 1px solid #ddd;">{{$diadiem->SoLuotXem}}</td>
                                                <td style=" border: 1px solid #ddd;">{{$diadiem->dacdiem->Ten}}</td>
                                                <td style=" border: 1px solid #ddd;">
                                                    <a href="admin/diadiem/update/{{$diadiem->id}}" class="green-text">
                                                        <i class="material-icons">done</i>
                                                    </a>
                                                    <a href="admin/diadiem/delete/{{$diadiem->id}}" class="red-text">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                </td>
                                                <td style=" border: 1px solid #ddd;">
                                                    @if($diadiem->TrangThai==1)
                                                        {{"Đã duyệt"}}
                                                    @else
                                                        {{"Chưa duyệt"}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="page">
                            {{$DiaDiem->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
