@extends('index')
@section('content')
<link href="admin_asset/css/viewMonAn.css" rel="stylesheet">
    <div class="container-fuild">
        <div class="row">
            <div class="image">
                <img src="upload/monan/{{$monan->HinhAnh}}" alt="img">
            </div>
            
            <div class="title">
                <h2>{{$diadiem->TieuDe}}</h2>
                <h3>{{$monan->TenMonAn}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-6">
                {!! html_entity_decode( $monan->MoTa) !!}
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection