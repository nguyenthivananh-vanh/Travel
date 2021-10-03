@extends('index')
@section('content')
<link href="admin_asset/css/notify.css" rel="stylesheet">
<div class="container-fuild">
    <div class="notify--show  ">
        <div class="form-notify ">        
            <h3>Bạn có muốn giới thiệu về đặc sản hay video không?</h3>
            <div class="accept ">
                <button class="green"><a href="home/getVideo/{{$id}}/{{$idDiaDiem}}">Video</a></button>
                <button class="green"><a href="home/getCulinary/{{$id}}/{{$idDiaDiem}}">Đặc sản</a></button>
                <button class="red"><a href="home/home/{{$id}}" > Trở lại</a></button>
            </div>
        </div>
    </div>

</div>
@endsection