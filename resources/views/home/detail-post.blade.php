@extends('index')
@section('content')
    <link href="admin_asset/css/detailPost.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Artifika' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>
     <section>
      
        <div class="contanier-detail" style="width:100vw" >
            <img src="https://haciendadesanantonio.com/wp-content/uploads/2019/05/home_01.jpg'" style="height:70vh; width: 100vw" alt="" class="post-img">
            <a class="logo"><img src="upload/home/myVietnam-big1.png" alt="logo" style="width: 200px; height:54px"></a>
            <div class="link-homepage">
                <a><i class="fas fa-home"></i></a>
               
                
            </div>
            <div class="text" style="font-family:'Armata';sans-serif">
                ABOUT SONDOONG
            </div>
        
        
        
        </div>
     </section>
     <section class="content mt-6">
         <div class="">
             <div class="row">
                <div class="col-12 pl-4">
                   <div class="post pl-4">
                    <div class="post-header" style="width:100%">
                        <div class="post-tilte  ml-2">
                            <p></p>
                            <h3 class="mt-4 mb-4 text-center" style="font-family:'Alice';sans-serif"> Danh lam thắng cảnh của việt nammmmm

                            </h3>
                        </div>
                    
                            <!-- <div class="alert alert-success">
                                thông báo<br>
                            </div> -->
                
                        <div class="author row">
                            <div class="col-1 pr-0">
                                <img src="upload/users/ava-admin.jpg" class="circle avatar-user"
                                    style='width:50px; height:50px' alt="Avatar User">
                            </div>
                            <div class="col-4" style="padding-left:0px;margin-left:-43px; ">
                                <b class="pl-1">Green</b>
                                <p class="pl-2">10/9/2021</p>
                            </div>
                      
                                <div class="col-7 text-center" style="z-index: 999">
                                    <div style="margin-left:43%" onClick="showSettingPost()" class="btn-setting-post"><i id="btnSettingPost"
                                                                                                 class="fas fa-ellipsis-h"></i>
                                    </div>

                                    <ul class="list-setting" id="listSetting">
                                      
                                                <li class="list-setting-item"><a style="font-weight: 500" onClick="deletePost()"
                                                                        >Xóa (Mới)
                                                bài viết</a></li>
                                
                                        <li class="list-setting-item"><a style="font-weight: 500"
                                                        onClick="editPost()"                >Sửa
                                                bài viết (mới)</a></li>
                                    </ul>
                                </div>
                       

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-10 col-md-12 col-sm-12">
                            <div class="post-content pl-4">
                                <h3 style="color: #277fbc">Tiêu đề video</h3>
                                <video controls autoplay width="100%" height="500px">
                                    <source src="https://www.youtube.com/watch?v=Z8ZnrN97rzQ"   >
                                </video>
                        
                            </div>
                            <div class="post-footer text-right" style="text-align:right">

                                <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span
                                        style="padding: 10px">11</span></span>
                            </div>
                            <div class="comment mt-4 pl-4">
                                
                                <form action="" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" />
                                        <div class="row">
                                            <div class="user_avatar col-1">
                                                <img src="upload/users/ava-admin.jpg" class="circle avatar-user"
                                                    style='width:50px; height:50px' alt="Avatar User">
                                            </div><!-- the input field -->
                                            <div class="input_comment col-10 pl-0">
                                                <input type="text" autocomplete="off" placeholder="Bình luận" name="cmt">
                                                <div class="cmt-img">
                                                    <label for="myFile"><i class="fas fa-camera"></i></label>
                                                    <input hidden type="file" id="myFile" name="hinhanh">
                                                </div>
                                                <button type="button" class="btn send-cmt" style="background-color: #277fbcl;"><i class="fas fa-paper-plane px-2 mb-1" ></i></button>

                                            </div>
                    

                                        </div>
                                </form>
                            </div>
                            <div class="new_comment pl-4" style="background-color:#f4f4f4; padding:20px">

                                    <div class="comment_body">
                                        <div class="row">
                                            <div class="user_avatar col-1">
                                                <img src="upload/users/ava-admin.jpg" class="circle avatar-user"
                                                    style='width:50px; height:50px' alt="Avatar User">
                                            </div>
                                            <b class="user col-11" style="padding:12px 12px 0 0;margin-left:-12px">Bp in ya area

                                            </b>

                                        </div>
                                        <div class="replied_to">
                                            <p>iam noi dung</p>

                                        
                                                <img class="post-img" style="width:300px" src="" alt="">
                                        
                                        </div>

                                        <!-- Finally someone who actually gets it!
                                        <div class="replied_to"><p><span class="user">Andrew Johnson:</span>That's exactly what I was thinking!</p></div>That's awesome!</p> -->

                                    </div>
                                    <!-- comments toolbar -->
                                    <div class="comment_toolbar row" style="margin:0 20px">
                                        <!-- inc. date and time -->
                                        <div class="comment_details col-6">
                                            <ul>
                                                <li><i class="fa fa-calendar"></i>22/09/2021</li>
                                            
                                                        <li>
                                                            <a href=""><i
                                                            class="far fa-trash-alt"></i> Xoá</a></li>
                                                
                                            
                                            </ul>
                                        </div>
                                    </div>
                                
                            
                            </div>
                            <hr>
                        </div>
                        <div class="col col-lg-2 col-md-0 col-sm-0">
                    <div class="sub-content">
                        <h5 class="menu__title">Địa điểm liên quan</h5>
                        <ul class="list-group sub-menu-detail" >
                            <li class="list-group-item">
                                <a href="">Tiêu dề</a>
                            </li>
                                
                        </ul>       
            
                        <hr>
            
                        <h5 class="menu__title">Đặc sản hấp dẫn</h5>
                
                        <div class="card">
                            <a href="">
                                <div class="card-image">
                                    <img class="post-img" style="height:200px" src="upload/user/ava-admin"
                                        alt="img">
                                    <span class="card-title">Tên món ăn</span>
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
                                            text-overflow: ellipsis;">Tiêu đề</p>
                            </div>

                        </div>
            
            
                    </div>
                </div>

                    </div>
                    
                            
















                </div>
                
             </div>
         </div>

    </section>
    <section>
    <div class="post-related pl-4">
                        <div class="destination">
                            <div class="destination-before"></div>
                            <span style="margin: 0 10px" class="destination-tittle" id="test1">Điểm đến liên quan</span>
                            <div class="destination-after"></div>
                        </div>
                        {{-- <div id="content-slider">
                            <div class="wrapper">
                                <div class="autoplay-view">
                                    @foreach ($noibat as $row)
                                        <div class="col-4">
                                            <div class="card">
                                                @if(isset($user))
                                                    <a href="home/view/{{$row->id}}/{{$row->TacGia}}/{{$user->id}}">
                                                        @else
                                                            <a href="home/view/{{$row->id}}/{{$row->TacGia}}">
                                                                @endif
                                                                <div class="card-image">
                                                                    <img class="post-img" style="height:200px"
                                                                        src="upload/diadiem/{{$row->HinhAnh}}" alt="img">
                                                                    <span class="card-title">{{$row->TieuDe}}</span>
                                                                </div>
                                                            </a>
                                                    </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <!-- Modal Delete -->

        <div id="deletePost" class="modal-view"> 
        <div class="modal-content"style="width:500px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn xóa bài viết không?</h5>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="document.getElementById('deletePost').style.display='none'" class="cancelbtn">Quay lại</button>
                <button type="button" class="btn btn red" onclick="document.getElementById('deletePost').style.display='none'" class="deletebtn">Xóa bài</button>
            </div>
            </div>
            </div>
        </div>


        <!-- Modal Edit -->
        <div id="editPost" class="modal-view" style="z-index:10;"> 
            <div class="modal-content"style="width:800px;z-index:10">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bạn muốn cập nhập?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">Quay lại</button>
                    <button type="button" class="btn btn-success"  onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">Địa điểm</button>
                    <button type="button" class="btn btn-success"  onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">Đặc sản</button>
                    <button type="button" class="btn btn-success"  onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">Video</button>

                    
                </div>
            </div>
        </div>
    </section>
    











































@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

    <!-- <script rel="stylesheet" href="admin_asset/js/admin.js"></script>-->
    <script href="admin_asset/js/homepage.js"></script>
    <script type="text/javascript" src="admin_asset/js/slider.js"></script>
    <script src="admin_asset/js/detailPost.js"></script>
    <!-- <script src="admin_asset/js/homepage.js"></script> -->
@endsection