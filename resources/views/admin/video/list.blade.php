@extends('admin.layout.index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/pagination.css">
    <section class="section section-posts grey lighten-4 content">
        <div class="container-fuild">
            <div class="row">
                <div>
                    <div class="card">
                        <div class="card-content pb-0">
                            <div class="row">
                                <div class="col-2">
                                    <span class="card-title">Video</span>
                                </div>
                                <div class="col-4">
                                    <div class="search-container">
                                        <form action="admin/video/search" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                            <input
                                                style="border: 1px solid #1976d2; border-radius: 3px;padding-left: 10px"
                                                type="text" placeholder="Search.." name="search">
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="col-2 text-right" style="text-align: right;">
                                    <button class="btn-add"><a href="admin/video/add">Thêm</a></button>
                                </div>
                            </div>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}<br>
                                </div>
                            @endif
                            <br><br>
                            <div class="table table-responsive">
                                <table style="border-collapse: collapse;" class="table striped">
                                    <thead>
                                    <tr>
                                        <th style=" border: 1px solid #ddd;">Id</th>
                                        <th style=" border: 1px solid #ddd;">Tiêu đề</th>
                                        <th style=" border: 1px solid #ddd;">Tiêu đề không dấu</th>
                                        <th style=" border: 1px solid #ddd;">Video</th>
                                        <th style=" border: 1px solid #ddd;">Mô tả</th>
                                        <th style=" border: 1px solid #ddd;">Id địa điểm</th>
                                        <th style=" border: 1px solid #ddd;">Tên địa điểm</th>
                                        <th style=" border: 1px solid #ddd;">Tác vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($video as $vid)

                                     
                                        <tr>
                                            <td style=" border: 1px solid #ddd;">{{$vid->id}}</td>
                                            <td style=" border: 1px solid #ddd;">{{$vid->TieuDe}}</td>
                                            <td style=" border: 1px solid #ddd;">{{$vid->TieuDeKhongDau}}</td>
                                            
                                            <td style=" border: 1px solid #ddd;">
                                                <video height="200px" controls>
                                                    <source src="upload/video/{{$vid->video}}"   >
                                                </video>
                                                
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
                                                        text-overflow: ellipsis; ">{{$vid->Mota}}</td>

                                            <td style=" border: 1px solid #ddd;">{{$vid->idDiaDiem}}</td>
                                           
                                            @foreach ($diadiem as $dd)                                           
                                                @if ($vid->idDiaDiem == $dd->id)
                                                <td style=" border: 1px solid #ddd;">{{$dd->TieuDe}}</td>
                                                @endif
                                            @endforeach
                                            
                                            <td style=" border: 1px solid #ddd;">
                                                <a href="admin/video/update/{{$vid->id}}" class="green-text">
                                                    <i class="material-icons">done</i>
                                                </a>
                                                <a href="admin/video/delete/{{$vid->id}}" class="red-text">
                                                    <i class="material-icons">close</i>
                                                </a>
                                            </td>
                                            
                                        </tr>
                                      

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="page">
                            {{$video->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
