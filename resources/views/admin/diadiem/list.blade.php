@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">  
    <section class="section section-posts lighten-4 content">
        <div class="container-fuild content">
            <div class=" pb-0">
                <div class="row title">
                    <div class="col-2">
                        <h5 class="card-title">Địa điểm</h5>
                    </div>
                    <div class="col-7"></div>
                    <div class="col-2">
                        <div class="search-container">
                            <form action="admin/diadiem/search/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input
                                    style="border: 1px solid #ddd; border-radius: 3px;padding-left: 10px"
                                    type="text" placeholder="Search.." name="search">
                                    
                            </form>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
                <div class="row task" >
                    <div class="col-9"></div>
                    <div class="col-3 " >
                        <button class="btn-add"><a href="admin/diadiem/add/{{$user->id}}"> <i class="fas fa-plus"></i>Thêm</a></button>                              
                        <button class="btn-add"><a href="admin/diadiem/duyetbai/{{$user->id}}">Duyệt bài</a></button>
                    </div>   
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                <div class="card-body" >
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr style="text-align:center">
                            <th >Id</th>
                            <th >Tiêu đề</th>
                            <th >Tóm tắt</th>
                            <th >Hình ảnh</th>
                            <th >Nội Dung</th>
                            <th >Nổi bật</th>
                            <th >Tác giả</th>
                            <th style="width:7%">Số lượt xem</th>
                            <th >Id đặc điểm</th>
                            <th >Tỉnh thành</th>
                            <th style="width:7%">Trạng thái</th>
                            <th style="width:5%">Tác vụ</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($DiaDiem as $diadiem)

                            @if($diadiem->TrangThai == 1)
                                <tr>
                                    <td >{{$diadiem->id}}</td>
                                    <td >{{$diadiem->TieuDe}}</td>
                                    <td style=" display: block;
                                                display: -webkit-box;
                                                width: 200px;
                                                height: 116px;
                                                margin: 0 auto;
                                                font-size: 14px;
                                                line-height: 1.5;
                                                -webkit-line-clamp: 5
                                                -webkit-box-orient: vertical;
                                                overflow: hidden;
                                                text-overflow: ellipsis;">{{$diadiem->TomTat}}</td>
                                    <td >
                                        <img src="upload/diadiem/{{$diadiem->HinhAnh}}" alt="img"
                                                width="100px">
                                    </td>
                                    <td style="display: block;
                                                display: -webkit-box;
                                                width: 300px;
                                                height: 116px;
                                                margin: 0 auto;
                                                font-size: 14px;
                                                line-height: 1.5;
                                                -webkit-line-clamp: 5;
                                                -webkit-box-orient: vertical;
                                                overflow: hidden;
                                                text-overflow: ellipsis; ">{{$diadiem->NoiDung}}</td>

                                    <td >{{$diadiem->NoiBat}}</td>
                                    <td >{{$diadiem->TacGia}}</td>
                                    <td >{{$diadiem->SoLuotXem}}</td>
                                    <td >{{$diadiem->dacdiem->Ten}}</td>
                                    <td>{{$diadiem->tinh}}
                                    <td >
                                        @if($diadiem->TrangThai==1)
                                            {{"Đã duyệt"}}
                                        @else
                                            {{"Chưa duyệt"}}
                                        @endif
                                    </td>
                                    <td >
                                        <a href="admin/diadiem/update/{{$diadiem->id}}/{{$user->id}}" class="green-text">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="admin/diadiem/delete/{{$diadiem->id}}/{{$user->id}}" class="red-text">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif

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

@endsection
