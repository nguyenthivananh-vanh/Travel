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
            <img src="upload/monan/{{$monan->HinhAnh}}" style="height:70vh; width: 100vw" alt="" class="post-img">
            @if(isset($user))
            <a href="home/home/{{$user->id}}" class="logo"><img src="upload/home/myVietnam-big1.png" alt="logo" style="width: 200px; height:54px"></a>
            @else
            <a href="home/home" class="logo"><img src="upload/home/myVietnam-big1.png" alt="logo" style="width: 200px; height:54px"></a>
            @endif
            <div class="link-homepage">
                @if(isset($user))
                <a href="home/home/{{$user->id}}"><i class="fas fa-home"></i></a>
                @else 
                <a href="home/home"><i class="fas fa-home"></i></a>
                @endif
            </div>
           
        </div>
    </section>
    <div class="container">
        <div class="row monan-title" >
            <h3 class="title" style="color:#277fbc ;font-family:'Alice';sans-serif"> {{$monan->TenMonAn}}</h3><br>
            <p><i>{{$monan->TieuDe}}</i></p>
         </div>
    </div>
  
    <section class="container content mt-6">   
         
        <div class="row">
            <div class="col-xl-8 col-l-8 col-md-7 col-sm-12  col-12">
                <div class="content-detail">
                    {!! html_entity_decode( $monan->MoTa) !!}
                </div>
                {{-- số lượt xem --}}
                {{-- <div class="post-footer text-right" style="text-align:right">
                    <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span
                                style="padding: 10px">{{$DiaDiem->SoLuotXem}}</span></span>
                </div> --}}
            </div>
            <div class="col-xl-4 col-l-4 col-md-5 col-sm-0 col-0">               
                <div class="sub-deyail-culinary">
                    <div class="sub-title">
                        <p>Đặc sản {{$monan->tinh}}</p>
                    </div>
                    <hr>
                    <ul class="list-sub" >
                        @if(isset($monanTinh))    
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