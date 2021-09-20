@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <h4 class="center">
                <span class="teal-text">Danh sách đặc sản</span>
            </h4>
        </div>
        <div class="row">
            @foreach ($monan as $monan)
                    <div class="col-4">
                        <div class="card">
                            <a href="home/showFormUpdate/{{$id}}/{{$tacgia}}/{{$idUser}}/{{$monan->id}}">
                                <div class="card-image">
                                    <img class="post-img" style="height:200px" src="upload/monan/{{$monan->HinhAnh}}"
                                         alt="img">
                                  
                                </div>
                            </a>
                            <div class="card-content">
                                <p style="display: block;
                          display: -webkit-box;
                          height: 38px;
                          margin: 0 auto;
                          font-size: 14px;
                          line-height: 1.5;
                          -webkit-line-clamp: 2;
                          -webkit-box-orient: vertical;
                          overflow: hidden;
                          text-overflow: ellipsis;
                    ">{{$monan->TieuDe}}</p>
                            </div>

                        </div>


                    </div>

                @endforeach
        </div>
    </div>
@endsection