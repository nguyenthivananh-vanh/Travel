@extends('admin.layout.index')
{{-- @section('css')
    <link type="text/css" rel="stylesheet" href="admin/user/admin_asset/css/materialize.min.css" media="screen,projection" />
    <link href="admin_asset/css/main.css" rel="stylesheet">
@endsection --}}
@section('content')

<section class="section section-users grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Users</span>
              <table class="striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Ngày tạo tài khoản</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt="" class="responsive-img circle" style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>Green D</td>
                    <td>green@gmail.com</td>
                    <td>1/1/2021<td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt="" class="responsive-img circle" style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>Green D</td>
                    <td>green@gmail.com</td>
                    <td>1/1/2021<td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt="" class="responsive-img circle" style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>Green D</td>
                    <td>green@gmail.com</td>
                    <td>1/1/2021<td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt="" class="responsive-img circle" style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>Green D</td>
                    <td>green@gmail.com</td>
                    <td>1/1/2021<td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt="" class="responsive-img circle" style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>Green D</td>
                    <td>green@gmail.com</td>
                    <td>1/1/2021<td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt="" class="responsive-img circle" style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>Green D</td>
                    <td>green@gmail.com</td>
                    <td>1/1/2021<td>
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  

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