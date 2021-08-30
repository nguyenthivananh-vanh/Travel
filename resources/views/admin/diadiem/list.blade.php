@extends('admin.layout.index')
@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
<section class="section section-posts grey lighten-4"  >
    <div class="container" style="min-width:1200px; padding:0">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Địa điểm</span>
              <button class="btn-add"><a href="admin/diadiem/add">Thêm</a></button>
              @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                <br><br>
              <table style="border-collapse: collapse;" class="striped">
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
                  </tr>
                </thead>
                <tbody>
                  @foreach ($DiaDiem as $diadiem)

                  <tr>
                    <td style=" border: 1px solid #ddd;">{{$diadiem->id}}</td>
                    <td style=" border: 1px solid #ddd;">{{$diadiem->TieuDe}}</td>
                    <td style=" border: 1px solid #ddd;">{{$diadiem->TieuDeKhongDau}}</td>
                    <td style="
                          display: block;
                          display: -webkit-box;
                          width: 100px;
                          height: 100px;
                          margin: 0 auto;
                          font-size: 14px;
                          line-height: 1.5;
                          -webkit-line-clamp: 4;
                          -webkit-box-orient: vertical;
                          overflow: hidden;
                          text-overflow: ellipsis;
                          border: 1px solid #ddd;
                    "
                    >{{$diadiem->TomTat}}</td>
                    <td style=" border: 1px solid #ddd;">
                      <img src="upload/diadiem/{{$diadiem->HinhAnh}}" alt="img" width="100px">
                    </td>
                    <td style="
                          display: block;
                          display: -webkit-box;
                          width: 300px;
                          height: 100px;
                          margin: 0 auto;
                          font-size: 14px;
                          line-height: 1.5;
                          -webkit-line-clamp: 4;
                          -webkit-box-orient: vertical;
                          overflow: hidden;
                          text-overflow: ellipsis;
                          border: 1px solid #ddd;
                    ">
                      {{$diadiem->NoiDung}}</td>

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
                  </tr>

                  @endforeach

                </tbody>
              </table>
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
