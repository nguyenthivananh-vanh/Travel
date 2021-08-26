@extends('admin.layout.index')
@section('content')
<section class="section section-comments grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Comments</span>
              <table class="striped">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Nội dung</th>
                      <th>Hình ảnh</th>                  
                      <th>Ngày đăng</th>                 
                      <th></th>
                    </tr>
                  </thead>
                <tbody>
                  @foreach ($comment as $cmt)                 
                  <tr>
                      <td>{{$cmt->id}}</td>
                      <td>{{$cmt->user->Ten}}</td>
                      <td>{{$cmt->NoiDung}}</td>
                      
                      <td width="70">
                        <img src="upload/comment/{{$cmt->HinhAnh}}" alt=""  style="width: 40px; margin-left: 10px;">
                      </td> 
                      <td>{{$cmt->created_at}}</td>
                      <td>                   
                        <a href="#" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
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