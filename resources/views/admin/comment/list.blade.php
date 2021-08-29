@extends('admin.layout.index')
@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
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
                      <th>Tác vụ</th>
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
                        <a href="admin/comment/delete/{{$cmt->id}}" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="page">
              {{$comment->links("pagination::bootstrap-4")}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection