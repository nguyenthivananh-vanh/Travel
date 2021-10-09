@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <section class="section section-posts lighten-4 content">
        <div class="container-fuild content">
            <div class=" pb-0">
                <div class="header__pc">
                    <div class="row title">
                        <div class="col-12">
                            <h5 class="card-title">Thống kê</h5>
                        </div>
                    </div>
                </div>
                <div class="header__mobile">
                    <div class="row title">
                        <div class="col-lg-1 col-md-1 col-sm-1 header__mobile-navbar">
                            <label for="header__mobile-input" class="header__mobile--btn" onclick="checkbar()">
                                <i class="fas fa-bars"></i>
                            </label>
                        </div>
                        <div class="col-lg-1 col-md-1  col-sm-1 header__mobile-navbar">
                            <span class="header__home"><a href="home/home/{{$user->id}}" ><i class="fas fa-home" ></i></a></span>       
                        </div>
                        
                        <div class="col-lg-10 col-md-10  col-sm-10 ">
                            <h5 class="card-title-tk">Thống kê</h5>
                        </div>
                        
                       
                    </div>
                   
                </div>
                    
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr style="text-align:center">
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
                            <td style="width:18%">{{$diadiem->TieuDe}}</td>
                            <td style="">{{$diadiem->TomTat}}</td>                          
                            <td style="text-align:center">{{$diadiem->SoLuotXem}}</td>
                            <td style="text-align:center"><a href="home/view/{{$diadiem->id}}/{{$diadiem->TacGia}}/{{$user->id}}"><i class="fas fa-eye"></i></a></td>
                        </tr>                      
                         @endforeach
                        
                      </tbody>
                    </table>
                </div>

            </div>
            <div class="page">
                {{$DiaDiem->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </section>

    <section class="section section-posts lighten-4 content">
        <div class="container-fuild content">
            <div class=" pb-0">
                <div class="row title">
                    <div class="col-12">
                        <h5 class="card-title">Thống kê món ăn</h5>
                    </div>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr style="text-align:center">
                            <th>ID</th>
                            <th>Tên Món Ăn</th>
                            <th>Mô tả</th>
                            <th>Số lượt xem</th>
                            <th>Xem bài viết</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($MonAn as $monan)
                            <tr>
                                <td>{{$monan->id}}</td>
                                <td style="width:18%">{{$monan->TenMonAn}}</td>
                                <td style="">{{$monan->TieuDe}}</td>
                                <td style="text-align:center">{{$monan->SoLuotXem}}</td>
                                <td style="text-align:center"><a href="home/viewMonAn/{{$monan->id}}/{{$monan->idDiaDiem}}"><i
                                            class="fas fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="page">
                {{$MonAn->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </section>

@endsection




