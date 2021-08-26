@extends('admin.layout.index')
@section('content')
<section class="section section-posts grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Posts</span>
              <table class="striped">
                <thead>
                  
                  <tr>
                    <th>id</th>
                    <th>Tiêu đề</th>
                    <th>Tiêu đề không dấu</th>
                    <th>Tóm tắt</th>
                    <th>Nội Dung</th>
                    <th>Hình ảnh</th>
                    <th>Nổi bật</th>
                    <th>Tác giả</th>
                    <th>Số lượt xem</th>
                    <th>id đặc điểm</th>
                   
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($diadiem as $diadiem)
                  
                  <tr>
                    <td>{{$diadiem->id}}</td>
                    <td>{{$diadiem->TieuDe}}</td>
                    <td>{{$diadiem->TieuDeKhongDau}}</td>
                    <td>{{$diadiem->TomTat}}</td>
                    <td>
                      <img src="upload/diadiem/{{$diadiem->HinhAnh}}" alt="img" width="100px">
                    </td>
                    <td>{{$diadiem->NoiDung}}</td>
                    <td>{{$diadiem->NoiBat}}</td>
                    <td>{{$diadiem->TacGia}}</td>
                    <td>{{$diadiem->SoLuotXem}}</td>
                    <td>{{$diadiem->dacdiem->Ten}}</td>
                    
                   
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
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