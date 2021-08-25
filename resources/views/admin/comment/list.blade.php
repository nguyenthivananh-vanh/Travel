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
                  <tr>
                      <td>1</td>
                      <td>Vanh Vanh</td>
                      <td>Bạn ơi cho mình hỏi cách book quán....</td>
                      <td width="70">
                        <img src="upload/home/NhaTrang2.jpg" alt=""  style="width: 40px; margin-left: 10px;">
                      </td> 
                      <td>                   
                        <a href="#" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gà Tây</td>
                    <td>Quán Nắng có mở cửa vào ....</td>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt=""  style="width: 40px; margin-left: 10px;">
                    </td> 
                    <td>                  
                        <a href="#" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gà Tây</td>
                    <td>Quán Nắng có mở cửa vào ....</td>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt=""  style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>                   
                        <a href="#" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gà Tây</td>
                    <td>Quán Nắng có mở cửa vào ....</td>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt=""  style="width: 40px; margin-left: 10px;">
                    </td>
                    <td>                   
                        <a href="#" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gà Tây</td>
                    <td>Quán Nắng có mở cửa vào ....</td>
                    <td width="70">
                      <img src="upload/home/NhaTrang2.jpg" alt=""  style="width: 40px; margin-left: 10px;">
                    </td>  
                    <td>                 
                        <a href="#" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gà Tây</td>
                    <td>Quán Nắng có mở cửa vào ....</td>
                    <td></td>
                      <td>               
                        <a href="#" class="red-text">
                            <i class="material-icons">close</i>
                        </a>
                    </td>
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