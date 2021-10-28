@extends('index')
@section('content')
<link href="admin_asset/css/detailPost.css" rel="stylesheet">
<link href="admin_asset/css/notify.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />


<div class="wrap">
    <section class="container-fuild">
        <div class="contanier-detail" style="width:100vw">
            <img src="upload/diadiem/{{$DiaDiem->HinhAnh}}" style="height:70vh; width: 100vw" alt="" class="post-img">
            <a class="logo"><img src="upload/home/myVietnam-big1.png" alt="logo" style="width: 200px; height:54px"></a>

            <div class="link-homepage">
                @if(isset($user))
                <a href="home/home/{{$user->id}}"><i class="fas fa-home"></i></a>
                @else
                <a href="home/home"><i class="fas fa-home"></i></a>
                @endif
            </div>
            <div class="text" style="font-family:'Armata';sans-serif">
                {{$DiaDiem->TieuDe}}
            </div>
        </div>
    </section>

    <section class="container content mt-6">
        <div class="row">
            <div class="col-12 pl-4">
                <div class="post pl-4">
                    <div class="post-header" style="width:100%">
                        <div class="post-tilte  ml-2">
                            <p></p>
                            <h3 class="mt-4 mb-4 text-center title" style="font-family:'Alice';sans-serif"> {{$DiaDiem->TieuDe}}</h3>
                        </div>
                        <!-- <div class="alert alert-success">
                                thông báo<br>
                            </div> -->
                            {{-- ava --}}
                        <div class="author row">
                            <div class="col-1 pr-0">
                                <img src="upload/users/{{$userAuthor->Avatar}}" class="circle avatar-user" style='width:50px; height:50px' alt="Avatar User">
                            </div>
                            <div class="col-4" style="padding-left:0px; ">
                                <b class="pl-1">{{$DiaDiem->TacGia}}</b>
                                <p class="pl-2" style="color: rgb(119, 119, 119);">{{$DiaDiem->created_at}}</p>
                            </div>
                            @if(isset($user))
                                @if($user->id == $userAuthor->id)
                                <div class="col-6"></div>
                                <div class="col-1 text-center" style="z-index: 999">
                                    <div style="margin-left:43%" onClick="showSettingPost()" class="btn-setting-post"><i id="btnSettingPost" class="fas fa-ellipsis-h"></i>
                                    </div>

                                    <ul class="list-setting" id="listSetting">
                                        <li class="list-setting-item"><a style="font-weight: 500" onClick="deletePost()">Xóa
                                                    bài viết</a></li>

                                        <li class="list-setting-item"><a style="font-weight: 500" onClick="editPost()">Sửa
                                                    bài viết</a></li>
                                    </ul>
                                </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                @if(isset($video))
                <div class="row">
                    {{-- <div class="col col-lg-10 col-md-12 col-sm-12"> --}}
                        <div class="post-content pl-4">
                            <h3 style="color: #277fbc">{{$video->TieuDe}}</h3>
                            <video autoplay loop controls muted  width="100%"  class="vid">>
                                <source src="upload/video/{{$video->video}}"   >
                            </video>

                            <p class="text-center" style="color: rgb(119, 119, 119);"><i>Video: {{$video->TieuDe}}</i></p>
                            {!! html_entity_decode( $video->Mota) !!}
                        </div>


                    {{-- </div> --}}
                </div>
                @endif

                <div class="row box-content">
                    <div class="col-xl-8 col-l-8 l-8 m-6 c-12">
                        <div class="content-detail">
                            {!! html_entity_decode( $DiaDiem->NoiDung) !!}
                        </div>
                        {{-- số lượt xem --}}
                        <div class="post-footer text-right" style="text-align:right">
                            <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span
                                        style="padding: 10px">{{$DiaDiem->SoLuotXem}}</span></span>
                        </div>

                        {{-- cmt --}}
                        <div class="comment ">
                            @if(isset($user))
                            <form action="home/comment/{{$user->id}}/{{$DiaDiem->id}}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="user_avatar col-1 m-2 c-2 pl-0" style="margin:0 !important">
                                        <img src="upload/users/{{$user->Avatar}}" class="circle avatar-user"
                                            style='width:50px; height:50px' alt="Avatar User">
                                    </div><!-- the input field -->
                                    <div class="input_comment col-11 m-10 c-10 pl-2" style="margin:0 !important">
                                        <input type="text" placeholder="Bình luận" name="cmt"class="ml-2">
                                        <div class="cmt-img">
                                            <label for="myFile"><i class="fas fa-camera"></i></label>
                                            <input hidden type="file" id="myFile" name="hinhanh">
                                        </div>
                                    </div>

                                </div>
                            </form>
                            @endif

                            <div class="new_comment" style="background-color:#f4f4f4; padding:20px">
                                <!-- build comment -->
                                @foreach ($comment as $cmt)
                                    <!-- the comment body -->
                                    <div class="comment_body">
                                        <div class="row mb-0">
                                            <div class="user_avatar col-2 m-2 c-2" style="margin:0 !important;">
                                                <img src="upload/users/{{$cmt->user->Avatar}}" class="circle avatar-user"
                                                    style='width:50px; height:50px' alt="Avatar User">
                                            </div>
                                            <b class="user col-10 m-10 c-10 pl-2" style="padding:12px">{{$cmt->user->Ten}}

                                            </b>

                                        </div>
                                        <div class="replied_to">
                                            <p>{{$cmt->NoiDung}}</p>

                                            @if (isset($cmt->HinhAnh))
                                                <img class="post-img" style="width:300px" src="upload/comment/{{$cmt->HinhAnh}}" alt="">
                                            @endif
                                        </div>

                                        <!-- Finally someone who actually gets it!
                                        <div class="replied_to"><p><span class="user">Andrew Johnson:</span>That's exactly what I was thinking!</p></div>That's awesome!</p> -->

                                    </div>
                                    <!-- comments toolbar -->
                                    <div class="comment_toolbar row" style="margin:0 20px">
                                        <!-- inc. date and time -->
                                        <div class="comment_details col-6">
                                            <ul>
                                                <li><i class="fa fa-calendar"></i> {{$cmt->created_at}}</li>
                                                @if(isset($user))
                                                    @if($user->id === $cmt->idUser)
                                                        <li>
                                                            <a href="home/deleteCmt/{{$cmt->id}}/{{$cmt->idDiaDiem}}/{{$userAuthor->Ten}}/{{$user->id}}"><i
                                                                    class="far fa-trash-alt"></i> Xoá</a></li>
                                                    @endif
                                                @endif

                                            </ul>
                                        </div>
                                    </div>

                                @endforeach
                            </div>


                        </div>

                        <hr>
                    </div>
                    <div class="right-menu col-xl-4 col-l-4 l-4 m-6 c-12">
                        <div class="sub-detail-travel">
                            <div class="sub-title">
                                <p>ĐỊA ĐIỂM LIÊN QUAN</p>
                            </div>
                            <hr>

                            <ul class="list-sub" >
                                @foreach ($diadiemList as $row)
                                @if(isset($user))
                                <li class="list-sub-item">
                                    <div class="row">
                                     <div class="col-4 item-img">
                                             <img src="upload/diadiem/{{$row->HinhAnh}}" alt="">
                                         </div>
                                         <div class="col-8 item-text">
                                             <p> <a href="home/view/{{$row->id}}/{{$row->TacGia}}/{{$user->id}}">{{$row->TieuDe}}<br>
                                            <span style="color: black; font-size: 14px">{{$row->TomTat}}</span></a></p>
                                             <span>{{$row->updated_at}}</span>
                                         </div>
                                    </div>
                                 </li>

                                @else
                                <li class="list-sub-item">
                                    <div class="row">
                                     <div class="col-4 item-img">
                                             <img src="upload/diadiem/{{$row->HinhAnh}}" alt="">
                                         </div>
                                         <div class="col-8 item-text">
                                             <p> <a href="home/view/{{$row->id}}/{{$row->TacGia}}">{{$row->TieuDe}}<br>
                                                <span style="color: black; font-size: 14px">{{$row->TomTat}}</span></a></p>

                                             <span>{{$row->updated_at}}</span>
                                         </div>
                                    </div>
                                 </li>

                                @endif
                                @endforeach
                            </ul>

                        </div>


                        <div class="sub-deyail-culinary">
                            <div class="sub-title">
                                <p>ĐẶC SẢN HẤP DẪN</p>
                            </div>
                            <hr>
                            <ul class="list-sub" >
                                @if(isset($monan))
                                    @foreach ($monan as $monan)

                                    <li class="list-sub-item">
                                        <div class="row">
                                        <div class="col-4 item-img">
                                                <img src="upload/monan/{{$monan->HinhAnh}}" alt="">
                                            </div>
                                            <div class="col-8 item-text">
                                                @if(isset($user))
                                                <p> <a href="home/viewMonAn/{{$monan->id}}/{{$monan->idDiaDiem}}/{{$user->id}}">{{$monan->TenMonAn}}<br>
                                                @else
                                                <p> <a href="home/viewMonAn/{{$monan->id}}/{{$monan->idDiaDiem}}">{{$monan->TenMonAn}}<br>
                                                @endif
                                                <span style="color: black; font-size: 14px">{{$monan->TieuDe}}</span></a></p>
                                                <span>{{$monan->updated_at}}</span>
                                            </div>
                                        </div>
                                    </li>

                                     @endforeach
                                @endif
                                @if(isset($monanTinh))
                                <div class="sub-title">
                                    <p>ĐẶC SẢN VÙNG MIỀN</p>
                                </div>
                                    @foreach ($monanTinh as $ma)

                                        <li class="list-sub-item">
                                            <div class="row">
                                                <div class="col-4 item-img">
                                                    <img src="upload/monan/{{$ma->HinhAnh}}" alt="">
                                                 </div>
                                                <div class="col-8 item-text">
                                                    @if(isset($user))
                                                        <p> <a href="home/viewMonAn/{{$ma->id}}/{{$ma->idDiaDiem}}/{{$user->id}}">{{$ma->TenMonAn}}<br>
                                                    @else
                                                         <p> <a href="home/viewMonAn/{{$ma->id}}/{{$ma->idDiaDiem}}">{{$ma->TenMonAn}}<br>
                                                    @endif
                                                     <span style="color: black; font-size: 14px">{{$ma->TieuDe}}</span></a></p>
                                                    <span>{{$ma->updated_at}}</span>
                                                </div>
                                            </div>
                                        </li>

                                    @endforeach
                                @endif
                            </ul>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        </div>
    </section>
    <section>
       <div class="post-related hide-post-related">
            <div class="destination">
                <!-- <div class="destination-before"></div> -->
                <span style="margin: 0 10px; margin-left:3%" class="destination-tittle" id="test1">Điểm đến liên quan</span>
                <!-- <div class="destination-after"></div> -->
            </div>
            <div id="content-slider">
                <div class="wrapper">
                    <div class="autoplay-view">
                    @foreach ($noibat as $row)
                        <div class="col-4">
                            <div class="card">
                                @if(isset($user))
                                    <a href="home/view/{{$row->id}}/{{$row->TacGia}}/{{$user->id}}">
                                        <div class="card-image">
                                            <img class="post-img" style="height:200px"
                                                    src="upload/diadiem/{{$row->HinhAnh}}" alt="img">
                                            <span class="card-title">{{$row->TieuDe}}</span>
                                        </div>
                                    </a>
                                @else
                                    <a href="home/view/{{$row->id}}/{{$row->TacGia}}">
                                        <div class="card-image">
                                            <img class="post-img" style="height:200px"
                                                    src="upload/diadiem/{{$row->HinhAnh}}" alt="img">
                                            <span class="card-title">{{$row->TieuDe}}</span>
                                        </div>
                                    </a>
                                @endif


                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal Delete -->
@if(isset($user))
<div id="deletePost" class="modal-view">
    <div class="modal-content"style="width:500px">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn xóa bài viết không?</h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="document.getElementById('deletePost').style.display='none'" class="cancelbtn">Quay lại</button>
            <button type="button" class="btn btn red" onclick="document.getElementById('deletePost').style.display='none'" class="deletebtn">
                <a href="home/acceptDelete/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}">Xoá bài</a>
            </button>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div id="editPost" class="modal-view" style="z-index:10;">
    <div class="modal-content"style="width:600px;z-index:10">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Bạn muốn cập nhập?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary green"><a href="home/updateView/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}">Sửa địa điểm</a></button>
            @if(isset($monan))
            <button class="btn btn-secondary green"><a href="home/updateCulinary/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}" > Sửa đặc sản</a></button>
            @endif
            @if(isset($video))
            <button class="btn btn-secondary green"><a href="home/updateVideo/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}/{{$video->id}}">Sửa video</a></button>

            @endif
            <button type="button" class="btn btn-secondary"  onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">Quay lại</button>

        </div>

    </div>
</div>
@endif
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
<script rel="stylesheet" href="admin_asset/js/admin.js"></script>
<script href="admin_asset/js/homepage.js"></script>
<script type="text/javascript" src="admin_asset/js/slider.js"></script>
<script src="admin_asset/js/detailPost.js"></script>
<!-- <script src="admin_asset/js/homepage.js"></script> -->

@endsection
@section('footer')
<div class="footer">
    @include('layout.footer')
</div>

@endsection
