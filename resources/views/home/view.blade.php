@extends('layout.index')
@section('content')
    <section class="content px-2 mt-6">
        <div style="width:70%">
            <div class="container-fluid mt-2">
                <div class="post mb-4">
                    <div class="post-header">
                        <div class="post-tilte  ml-2">
                            <p></p>
                            <h3 class="mt-4 mb-4">{{ $DiaDiem->TieuDe }}
                            </h3>
                        </div>
                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}<br>
                            </div>
                        @endif
                        <div class="author row">
                            <div class="col-1">
                                <img src="upload/users/{{ $userAuthor->Avatar }}" class="circle avatar-user"
                                    style='width:50px; height:50px' alt="Avatar User">
                            </div>
                            <div class="col-4">
                                <b class="pl-1">{{ $DiaDiem->TacGia }}</b>
                                <p class="pl-2">{{ $DiaDiem->created_at }}</p>
                            </div>
                            @if (isset($user))
                                @if ($user->id == $userAuthor->id)
                                    <div class="col-7 text-right" style="z-index: 9">
                                        <div onClick="showSettingPost()" class="btn-setting-post"><i id="btnSettingPost"
                                                class="fas fa-ellipsis-h"></i>
                                        </div>

                                        <ul class="list-setting" id="listSetting">
                                            <!-- <li class="list-setting-item"><a style="font-weight: 500"
                                                                             href="home/deleteView/{{ $DiaDiem->id }}/{{ $DiaDiem->TacGia }}/{{ $user->id }}">X??a
                                                    b??i vi???t</a></li> -->
                                            <li class="list-setting-item"><a style="font-weight: 500"
                                                    onClick="deletePost()">X??a (M???i)
                                                    b??i vi???t</a></li>

                                            <li class="list-setting-item"><a style="font-weight: 500"
                                                    href="home/notifyUpdate/{{ $DiaDiem->id }}/{{ $DiaDiem->TacGia }}/{{ $user->id }}">S???a
                                                    b??i vi???t</a></li>
                                            <li class="list-setting-item"><a style="font-weight: 500"
                                                    onClick="editPost()">S???a
                                                    b??i vi???t (m???i)</a></li>
                                        </ul>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="post-content">
                        @if (isset($video))
                            <h3 style="color: #277fbc">{{ $video->TieuDe }}</h3>
                            <video controls autoplay width="100%" height="500px">
                                <source src="upload/video/{{ $video->video }}">
                            </video>
                            {!! html_entity_decode($video->Mota) !!}
                        @endif
                        {!! html_entity_decode($DiaDiem->NoiDung) !!}
                    </div>
                    <div class="post-footer text-right" style="text-align:right">
                        <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span
                                style="padding: 10px">{{ $DiaDiem->SoLuotXem }}</span></span>
                    </div>
                </div>
                <div class="comment mt-4">
                    @if (isset($user))
                        <form action="home/comment/{{ $user->id }}/{{ $DiaDiem->id }}" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="row">
                                <div class="user_avatar col-1">
                                    <img src="upload/users/{{ $user->Avatar }}" class="circle avatar-user"
                                        style='width:50px; height:50px' alt="Avatar User">
                                </div><!-- the input field -->
                                <div class="input_comment col-9">
                                    <input type="text" placeholder="B??nh lu???n" name="cmt">
                                    <div class="cmt-img">
                                        <label for="myFile"><i class="fas fa-camera"></i></label>
                                        <input hidden type="file" id="myFile" name="hinhanh">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button class="btn mt-2" style="background-color: #277fbc">G???i</button>
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
                                        <img src="upload/users/{{ $cmt->user->Avatar }}" class="circle avatar-user"
                                            style='width:50px; height:50px' alt="Avatar User">
                                    </div>
                                    <b class="user col-11" style="padding:12px">{{ $cmt->user->Ten }}

                                    </b>

                                </div>
                                <div class="replied_to">
                                    <p>{{ $cmt->NoiDung }}</p>

                                    @if (isset($cmt->HinhAnh))
                                        <img class="post-img" style="width:300px"
                                            src="upload/comment/{{ $cmt->HinhAnh }}" alt="">
                                    @endif
                                </div>                      
                            </div>
                            <!-- comments toolbar -->
                            <div class="comment_toolbar row" style="margin:0 20px">
                                <!-- inc. date and time -->
                                <div class="comment_details col-6">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> {{ $cmt->created_at }}</li>
                                        @if (isset($user))
                                            @if ($user->id === $cmt->idUser)
                                                <li>
                                                    <a
                                                        href="home/deleteCmt/{{ $cmt->id }}/{{ $cmt->idDiaDiem }}/{{ $userAuthor->Ten }}/{{ $user->id }}"><i
                                                            class="far fa-trash-alt"></i> Xo??</a>
                                                </li>
                                            @endif
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="post-related">
                    <div class="destination">
                        <div class="destination-before"></div>
                        <span style="margin: 0 10px" class="destination-tittle" id="test1">??i???m ?????n li??n quan</span>
                        <div class="destination-after"></div>
                    </div>
                    <div id="content-slider">
                        <div class="wrapper">
                            <div class="autoplay-view">
                                @foreach ($noibat as $row)
                                    <div class="col-4">
                                        <div class="card">
                                            @if (isset($user))
                                                <a
                                                    href="home/view/{{ $row->id }}/{{ $row->TacGia }}/{{ $user->id }}">
                                                @else
                                                    <a href="home/view/{{ $row->id }}/{{ $row->TacGia }}">
                                            @endif
                                            <div class="card-image">
                                                <img class="post-img" style="height:200px"
                                                    src="upload/diadiem/{{ $row->HinhAnh }}" alt="img">
                                                <span class="card-title">{{ $row->TieuDe }}</span>
                                            </div>
                                            </a>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="sub-content">
            <h5 class="menu__title">?????a ??i???m li??n quan</h5>
            @foreach ($diadiemList as $row)
                <ul class="list-group sub-menu-detail">
                    @if (isset($user))
                        <li class="list-group-item">
                            <a
                                href="home/view/{{ $row->id }}/{{ $row->TacGia }}/{{ $user->id }}">{{ $row->TieuDe }}</a>
                        </li>
                    @else
                        <li class="list-group-item">
                            <a href="home/view/{{ $row->id }}/{{ $row->TacGia }}">{{ $row->TieuDe }}</a>
                        </li>
                    @endif
                </ul>
            @endforeach
            <hr>
            @if (isset($monan))
                <h5 class="menu__title">?????c s???n h???p d???n</h5>
                @foreach ($monan as $monan)
                    <div class="card">
                        <a href="home/viewMonAn/{{ $monan->id }}/{{ $monan->idDiaDiem }}">
                            <div class="card-image">
                                <img class="post-img" style="height:200px" src="upload/monan/{{ $monan->HinhAnh }}"
                                    alt="img">
                                <span class="card-title">{{ $monan->TenMonAn }}</span>
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
                                        text-overflow: ellipsis;">{{ $monan->TieuDe }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <!-- Modal Delete -->

        <div id="deletePost" class="modal-view">
            <div class="modal-content" style="width:500px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">B???n c?? ch???c l?? mu???n x??a b??i vi???t kh??ng?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="document.getElementById('deletePost').style.display='none'" class="cancelbtn">Quay
                        l???i</button>
                    <button type="button" class="btn btn red"
                        onclick="document.getElementById('deletePost').style.display='none'" class="deletebtn">X??a
                        b??i</button>
                </div>
            </div>
        </div>
        
        <!-- Modal Edit -->
        <div id="editPost" class="modal-view" style="z-index:10;">
            <div class="modal-content" style="width:800px;z-index:10">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">B???n mu???n c???p nh???p?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">Quay
                        l???i</button>
                    <button type="button" class="btn btn-success"
                        onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">?????a
                        ??i???m</button>
                    <button type="button" class="btn btn-success"
                        onclick="document.getElementById('editPost').style.display='none'" class="cancelbtn">?????c
                        s???n</button>
                    <button type="button" class="btn btn-success"
                        onclick="document.getElementById('editPost').style.display='none'"
                        class="cancelbtn">Video</button>
                </div>
            </div>
        </div>
        
    </section>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script type="text/javascript" src="admin_asset/js/slider.js"></script>
    <script>
        var showFiller = true;

        function showNavbar() {
            this.showFiller = !this.showFiller;
        }
    </script>

@endsection
