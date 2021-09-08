@extends('admin.layout.index')

@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
<section class="section section-users grey lighten-4 content">
    <div class="container-admin">
      <div class="row">
        <div >
          <div class="card">
            <div class="card-content pb-0" >
              <div class="row">
                <div class="col-6">
                <span class="card-title">Thống kê</span>
                </div>
                
              </div>
             
              <table class="striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Tóm tắt</th>                
                    <th>Số lượt xem</th>
                    <th>Xem bài viết</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($DiaDiem as $diadiem)
                        <tr>
                            <td>{{$diadiem->id}}</td>
                            <td>{{$diadiem->TieuDe}}</td>
                            <td>{{$diadiem->TomTat}}</td>                          
                            <td>{{$diadiem->SoLuotXem}}</td>
                            <td><a href="home/view/{{$diadiem->id}}/{{$diadiem->TacGia}}"><i class="fas fa-eye"></i></a></td>
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