@extends('index') 
@section('content')
<link href="admin_asset/css/detailPost.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>

 
<div class="container-fuild">
    <div class="notify delete">
        <div class="form-notify form-delete">
            <h2>Xóa</h2>
            <hr>
            <h4>Bạn có chắc chắn muốn xóa không?</h4>
            <div class="accept ">
                <button class="green"><a href="home/acceptDelete/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}">Xoá bài</a></button>
                <button class="red"><a href="home/view/{{$DiaDiem->id}}/{{$DiaDiem->TacGia}}/{{$user->id}}" > Trở lại</a></button>
            </div>
        </div>
        
    </div>
    <div class="notify update">
        <div class="form-notify form-update">
            <h2>Chỉnh sửa</h2>
            <hr>
            <h4>Bạn muốn chỉnh sửa thông tin?</h4>
            <div class="accept">
                <button class="green"><a href="home/updateView/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}">Sửa địa điểm</a></button>
                @if(isset($monan))
                <button class="green"><a href="home/updateCulinary/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}" > Sửa Món Ăn</a></button>
                @endif
                @if(isset($video))
                <button class="green"><a href="home/updateVideo/{{$DiaDiem->id}}/{{$userAuthor->Ten}}/{{$user->id}}/{{$video->id}}">Sửa video</a></button>
                
                @endif
                <button class="red"><a href="home/view/{{$DiaDiem->id}}/{{$DiaDiem->TacGia}}/{{$user->id}}" > Trở lại</a></button>
            </div>
        </div>
    </div>
</div>
<div class="wrap">
    <section class="container-fuild">
        <div class="contanier-detail" style="width:100vw">
            <img src="upload/diadiem/{{$DiaDiem->HinhAnh}}" style="height:70vh; width: 100vw" alt="" class="post-img">
            <a class="logo"><img src="upload/home/myVietnam-big1.png" alt="logo" style="width: 200px; height:54px"></a>
            <div class="link-homepage">
                <a href="home/home/{{$user->id}}"><i class="fas fa-home"></i></a>
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
                                <p class="pl-2">{{$DiaDiem->created_at}}</p>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-1 text-center" style="z-index: 999">
                                <div style="margin-left:43%" onClick="showSettingPost()" class="btn-setting-post"><i id="btnSettingPost" class="fas fa-ellipsis-h"></i>
                                </div>

                                <ul class="list-setting" id="listSetting">
                                    <li class="list-setting-item"><a style="font-weight: 500" onClick="deletePost()">Xóa (Mới)
                                                bài viết</a></li>

                                    <li class="list-setting-item"><a style="font-weight: 500" onClick="editPost()">Sửa
                                                bài viết (mới)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($video))
                <div class="row">
                    {{-- <div class="col col-lg-10 col-md-12 col-sm-12"> --}}
                        <div class="post-content pl-4">
                            <h3 style="color: #277fbc">{{$video->TieuDe}}</h3>
                            <video controls  width="100%" height="500px">
                                <source src="upload/video/{{$video->video}}"   >
                            </video>
                            {!! html_entity_decode( $video->Mota) !!}
                        </div>
                    
                        
                    {{-- </div> --}}
                </div>
                @endif
                
                <div class="row">
                    <div class="col-9">
                        <div >
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
                                    <div class="user_avatar col-1">
                                        <img src="upload/users/{{$user->Avatar}}" class="circle avatar-user"
                                            style='width:50px; height:50px' alt="Avatar User">
                                    </div><!-- the input field -->
                                    <div class="input_comment col-11">
                                        <input type="text" placeholder="Bình luận" name="cmt">
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
                                        <div class="row">
                                            <div class="user_avatar col-1">
                                                <img src="upload/users/{{$cmt->user->Avatar}}" class="circle avatar-user"
                                                    style='width:50px; height:50px' alt="Avatar User">
                                            </div>
                                            <b class="user col-11" style="padding:12px">{{$cmt->user->Ten}}
                
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
                    <div class="col-3">
                        {{-- <div class="col col-lg-2 col-md-0 col-sm-0"> --}}
                            <div class="sub-content-travel">
                                <div class="travel-title">
                                    <h3 class="menu__title">Địa điểm liên quan</h3>  
                                </div>
                                                      
                                @foreach ($diadiemList as $row)
                                    <ul class="list-group sub-menu-detail" >
                                        @if(isset($user))
                                        <li class="list-group-item">
                                            <a href="home/view/{{$row->id}}/{{$row->TacGia}}/{{$user->id}}">{{$row->TieuDe}}</a>
                                        </li>
                                        @else
                                        <li class="list-group-item">
                                            <a href="home/view/{{$row->id}}/{{$row->TacGia}}">{{$row->TieuDe}}</a>
                                        </li> 
                                        @endif         
                                    </ul>       
                                @endforeach
                                
                            </div>
                            <hr>
                            <div class="sub-content-culinary">
                                @if(isset($monan))
                                <h3 class="menu__title" >Đặc sản hấp dẫn</h3>
                                @foreach ($monan as $monan)
                                    <div class="card">
                                        <a href="home/viewMonAn/{{$monan->id}}/{{$monan->idDiaDiem}}">
                                            <div class="card-image">
                                                <img class="post-img" style="height:200px" src="upload/monan/{{$monan->HinhAnh}}"
                                                    alt="img">
                                                <span class="card-title">{{$monan->TenMonAn}}</span>
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
                                                        text-overflow: ellipsis;">{{$monan->TieuDe}}</p>
                                        </div>
                    
                                    </div>
                                @endforeach
                                @endif
                            </div>
                             
                        {{-- </div> --}}

                    </div>
                </div>  

            </div>

        </div>
        <div class="row">       
            <div class="post-related">
                <div class="destination">
                    <div class="destination-before"></div>
                    <span style="margin: 0 10px" class="destination-tittle" id="test1">Điểm đến liên quan</span>
                    <div class="destination-after"></div>
                </div>
                <div id="content-slider">
                    <div class="wrapper">
                        <!-- <h2>Slick Carousel Example<h2> -->
                        <div class="autoplay">
                            @foreach ($noibat as $row)
                                <div class="col-4">
                                    <div class="card">
                                        <a href="home/view/{{$row->id}}/{{$row->TacGia}}">
                                            <div class="card-image">
                                                <img class="post-img" style="height:200px"
                                                    src="upload/diadiem/{{$row->HinhAnh}}" alt="img">
                                                <span class="card-title">{{$row->TieuDe}}</span>
                                            </div>
                                        </a>
                                
                                    </div>
                                </div>
                            @endforeach
        
                        </div>
                    </div>
                </div>

            </div>
        </div>   
    </section>
   
</div>
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
