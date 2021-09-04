@extends('layout.index')
@section('content')
<section class="content px-2 mt-6" >
    <div class="container-fluid mt-2">
        <div class="post">
            <div class="post-header">
                <div class="post-tilte  ml-2">
                <p></p>
                <h5 style="font-weight:bold">Lời mời gọi của núi rừng Tây Bắc , Việt Nam , đoàn quân Việt Nam đi, chung lòng cứu quốc bước chân rộn vang trên 
                    đường ngập
                </h5>
                </div>
                <div class="author row">
                    <div class="col-1">
                        <img src="upload/users/ava-admin.jpg" class="circle" style='width:50px; height:50px' alt="Avatar User">
                    </div>
                    <div class="col-4">
                        <b>Green</b>
                        <p>12/12/2021</p>
                    </div>

                </div>
            </div>
            <div class="post-content">
                <p>Vùng Tây Bắc hay Tây Bắc Bộ là vùng miền núi phía tây của miền Bắc Việt Nam, 
                    có chung đường biên giới với Lào và Trung Quốc. Vùng này là một trong 3 tiểu vùng địa lý 
                    tự nhiên của Bắc Bộ Việt Nam (2 tiểu vùng kia là Vùng Đông Bắc
                     và Đồng bằng sông Hồng). Vùng có diện tích 50.585,32 Km2</p>
            </div>
            <div class="post-footer text-right" style="text-align:right">
                <span style="padding: 10px"><i class="far fa-heart" style="color:#277fbc"></i> <span style="padding: 8px">110</span></span>
                <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span style="padding: 10px">100</span></span>
            </div>
        </div>
        <div class="comment">
            <div class="user_avatar">
                <img src="upload/users/ava-admin.jpg" class="circle" style='width:50px; height:50px' alt="Avatar User">
                    </div><!-- the input field --><div class="input_comment">
                        <input type="text" placeholder="Join the conversation..">
                    </div>

            </div>
            <div class="new_comment" style="background-color:#f4f4f4; padding:20px">

			<!-- build comment -->
                <div class="user_avatar">
                    <img src="upload/users/ava-admin.jpg" class="circle" style='width:50px; height:50px' alt="Avatar User">
                    </div><!-- the comment body --><div class="comment_body">
                        <p><div class="replied_to"><p><b class="user">John Smith:

                        </b>Gastropub cardigan jean shorts, kogi Godard PBR&B lo-fi locavore. Organic chillwave vinyl Neutra. Bushwick Helvetica cred freegan, crucifix Godard craft beer deep v mixtape cornhole Truffaut master cleanse pour-over Odd Future beard. Portland polaroid iPhone.</p></div>
                        <!-- Finally someone who actually gets it!
                        <div class="replied_to"><p><span class="user">Andrew Johnson:</span>That's exactly what I was thinking!</p></div>That's awesome!</p> -->

                </div>

			 	<!-- comments toolbar -->
			 	<div class="comment_toolbar" style="margin:0 20px">

			 		<!-- inc. date and time -->
			 		<div class="comment_details">
			 			<ul style="margin-left:45px">
			 				<li><i class="fa fa-clock-o"></i> 14:59</li>
			 				<li><i class="fa fa-calendar"></i> 04/01/2015</li>
			 				<li><i class="fa fa-pencil"></i> <span class="user">Simon Gregor</span></li>
			 			</ul>
			 		</div><!-- inc. share/reply and love --><div class="comment_tools">
			 			<ul>
			 				<!-- <li><i class="fa fa-share-alt"></i></li> -->
			 				<li><i class="fa fa-reply"></i></li>
			 				<li><i class="fa fa-heart love"><span class="love_amt"> 4039</span></i></li>
			 			</ul>
			 		</div>
                    

			    </div>
                <div class="comment_body" style="margin:0 50px 0 10%; padding-right:10%">
                            
                            <div class="replied_to">
                                <p>
                                    <b class="user">Andrew Johnson:</b>
                                    <span>That's exactly what I was thinking!</span>
                                </p>
                        </div>
                    </div>
            </div>
           



		 	

		</div>
        <hr>
        <div class="post-related">
        <div class="row">
            <h4>Tin lien quan</h4>
 
            <div class="col-4">

            <div class="card">
                <a href="#">
                <div class="card-image">
                    <img style="height:200px" src="upload/users/admin.jpg" alt="img">
                    <span class="card-title">Tieeu dde</span>
                </div>
                </a>
                <div class="card-content" >
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
                            ">Day la mot caitom tasttttttttttttttttttttttttt
                            dhdjjhfdjfhhhhhhhhhhhhhhh</p>
                </div>

      </div>
        </div>
        
        
    </div>
</section>


@endsection