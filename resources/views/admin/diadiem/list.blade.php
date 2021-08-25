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
                  <tr>
                    <td>Đà Nẵng</td>
                    <td>Green D</td>
                    <td>14/08/2021</td>
                    <td>Đà Nẵng</td>
                    <td>Green D</td>
                    <td>14/08/2021</td>
                    <td>Đà Nẵng</td>
                    <td>Green D</td>
                    <td>14/08/2021</td>
                    <td>Green D</td>
                   
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Hội An</td>
                    <td>Diệp</td>
                    <td>2/72021</td>
                    <td>Hội An</td>
                    <td>Diệp</td>
                    <td>2/72021</td>
                    <td>Hội An</td>
                    <td>Diệp</td>
                    <td>2/72021</td>
                    <td>Diệp</td>
                   
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Review các quán cà phê Đà Nẵng</td>
                    <td>Peaches</td>
                    <td>14/08/2021</td>
                    <td>Review các quán cà phê Đà Nẵng</td>
                    <td>Peaches</td>
                    <td>14/08/2021</td>
                    <td>Review các quán cà phê Đà Nẵng</td>
                    <td>Peaches</td>
                    <td>14/08/2021</td>
                    <td>Review các quán cà phê Đà Nẵng</td>

                    
                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Review các quán cà phê Đà Lạt</td>
                    <td>mot_con_vit</td>
                    <td>14/08/2021</td>
                    <td>Review các quán cà phê Đà Lạt</td>
                    <td>mot_con_vit</td>
                    <td>14/08/2021</td>
                    <td>Review các quán cà phê Đà Lạt</td>
                    <td>mot_con_vit</td>
                    <td>14/08/2021</td>
                    <td>Review các quán cà phê Đà Lạt</td>
                   


                    <td>
                      <a href="details.html" class="btn blue lighten-2">Details</a>
                    </td>
                  </tr>
                  <tr>
                    <td>Phú Quốc</td>
                    <td>Mini</td>
                    <td>14/08/2021</td>
                    <td>Phú Quốc</td>
                    <td>Mini</td>
                    <td>14/08/2021</td>
                    <td>Phú Quốc</td>
                    <td>Mini</td>
                    <td>14/08/2021</td>
                    <td>Phú Quốc</td>
                    
    
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