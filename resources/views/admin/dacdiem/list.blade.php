@extends('admin.layout.index')
@section('content')

<section class="section section-users grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Đặc Điểm</span>
              <table class="striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tên Không Dấu</th>                
                    <th>Vùng Miền</th>                
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($dacdiem as $dd)
                        <tr>
                            <td>{{$dd->id}}</td>
                            <td>{{$dd->Ten}}</td>
                            <td>{{$dd->TenKhongDau}}</td>                          
                            <td>{{$dd->vungmien->Ten}}</td>                          
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