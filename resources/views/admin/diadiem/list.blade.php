@extends('admin.layout.index')
@section('content')
<section class="section section-posts grey lighten-4"  >
    <div class="container" style="min-width:1200px; padding:0">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Posts</span>
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
                  </tr>
                </thead>
                <tbody>
                  @foreach ($diadiem as $diadiem)
                  
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
                    <!-- <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td> -->
                  </tr>
                     
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <div class="card-action">
              <ul class="pagination">
                <li class="dsabled">
                  <a href="#!" class="blue-text">
                    <i class="material-icons">chevron_left</i>
                  </a>
                </li>
                <li class="active blue lighten-2">
                  <a href="#!" class="white-text">1</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">2</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">3</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">4</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">5</a>
                </li>
                <li class="waves-effect">
                  <a href="#!" class="blue-text">
                    <i class="material-icons">chevron_right</i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection