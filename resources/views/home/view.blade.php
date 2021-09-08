@extends('layout.index')
@section('content')
<section class="content px-2 mt-6" >
    <div class="container-fluid mt-2">
        <div class="post">
            <div class="post-header">
                <div class="post-tilte  ml-2">
                <p></p>
                <h5 style="font-weight:bold">{{$DiaDiem->TieuDe}}
                </h5>
                </div>
                <div class="author row">
                    <div class="col-1">
                        <img src="upload/users/{{$user->Avatar}}" class="circle" style='width:50px; height:50px' alt="Avatar User">
                    </div>
                    <div class="col-4">
                        <b>{{$DiaDiem->TacGia}}</b>
                        <p>{{$DiaDiem->created_at}}</p>
                    </div>

                </div>
            </div>
            <div class="post-content">              
                     {!! html_entity_decode( $DiaDiem->NoiDung) !!}
            </div>
            <div class="post-footer text-right" style="text-align:right">
                <span style="padding: 10px"><i class="far fa-heart" style="color:#277fbc"></i> <span style="padding: 8px">110</span></span>
                <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span style="padding: 10px">{{$DiaDiem->SoLuotXem}}</span></span>
            </div>
        </div>
        
        <div class="comment">
            @if(isset($userLogin))
            <form action="home/comment/{{$userLogin->id}}/{{$DiaDiem->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="user_avatar">
                <img src="upload/users/{{$userLogin->Avatar}}" class="circle" style='width:50px; height:50px' alt="Avatar User">
            </div><!-- the input field -->
                <div class="input_comment">
                    <input type="text" placeholder="Bình luận" name="cmt">
                </div>
                <div class="input_comment">
                    <input type="file" name="hinhanh">
                </div>
            </div>
            @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}<br>
                    </div>
                @endif
                <button class="btn green">Gửi</button>
            </form>
            @endif
            <div class="new_comment" style="background-color:#f4f4f4; padding:20px">
                
			<!-- build comment -->
            @foreach ($comment as $cmt)
                <div class="user_avatar">
                    <img src="upload/users/{{$cmt->user->Avatar}}" class="circle" style='width:50px; height:50px' alt="Avatar User">
                </div><!-- the comment body -->
                <div class="comment_body">
                    <p><div class="replied_to">
                        <p><b class="user">{{$cmt->user->Ten}}:

                        </b>{{$cmt->NoiDung}}</p>
                        @if (isset($cmt->HinhAnh))                                                  
                            <img style="width:300px" src="upload/comment/{{$cmt->HinhAnh}}" alt="">
                        @endif
                    </div></p>
                        <!-- Finally someone who actually gets it!
                        <div class="replied_to"><p><span class="user">Andrew Johnson:</span>That's exactly what I was thinking!</p></div>That's awesome!</p> -->

                </div>             
			 	<!-- comments toolbar -->
			 	<div class="comment_toolbar" style="margin:0 20px">
			 		<!-- inc. date and time -->
			 		<div class="comment_details">
			 			<ul >
			 				<li><i class="fa fa-calendar"></i> {{$cmt->created_at}}</li>
			 				{{-- <li><i class="fa fa-pencil"></i> <span class="user">Simon Gregor</span></li> --}}
			 			</ul>
			 		</div><!-- inc. share/reply and love -->
                     {{-- <div class="comment_tools">
			 			<ul>
			 				<!-- <li><i class="fa fa-share-alt"></i></li> -->
			 				<li><i class="fa fa-reply"></i></li>
			 				<li><i class="fa fa-heart love"><span class="love_amt"> 4039</span></i></li>
			 			</ul>
			 		</div> --}}
			    </div>
                {{-- <div class="comment_body" style="margin:0 50px 0 10%; padding-right:10%">
                            
                            <div class="replied_to">
                                <p>
                                    <b class="user">Andrew Johnson:</b>
                                    <span>That's exactly what I was thinking!</span>
                                </p>
                        </div>
                    </div> --}}
                    @endforeach
            </div>
            
		</div>
        
        
        <hr>
        <div class="post-related">
            <div class="destination">
                <div class="destination-before"></div>
                <span style="margin: 0 10px" class="destination-tittle" id="test1">Điểm đến hấp dẫn</span>
                <div class="destination-after"></div>
            </div>
            <div id="content-slider">
                <div class="wrapper">
        <!-- <h2>Slick Carousel Example<h2> -->
                    <div  class="autoplay">
                        <div><img src="https://picsum.photos/300/200?random=1"></div>
                        <div><img src="https://picsum.photos/300/200?random=2"></div>
                        <div><img src="https://picsum.photos/300/200?random=3"></div>
                        <div><img src="https://picsum.photos/300/200?random=4"></div>
                        <div><img src="https://picsum.photos/300/200?random=5"></div>
                        <div><img src="https://picsum.photos/300/200?random=6"></div>
                        <div><img src="https://picsum.photos/300/200?random=7"></div>

                    </div>
                </div>


   
            </div>
                    


   
        </div> 
    </div>
        
    
</section>


@endsection
@section('script')

  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    
  <!-- <script rel="stylesheet" href="admin_asset/js/admin.js"></script>
  <script  href="admin_asset/js/homepage.js"></script> -->
  <script type="text/javascript" src="admin_asset/js/homepage.js"></script>
  <!-- <script type="text/javascript" src="admin_asset/js/admin.js"></script> -->
 

  <script rel="stylesheet" href="admin_asset/js/admin.js"></script>
  <script>
  var showFiller=true;
  function showNavbar(){
    this.showFiller =!this.showFiller;
  }
  </script>

  @endsection