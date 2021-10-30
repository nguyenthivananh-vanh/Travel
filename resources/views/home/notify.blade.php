@extends('index')
@section('content')
    <style>
        .overlayNotify {
            background-image: url('/upload/diadiem/{{ $diadiem->HinhAnh }}');
            width: 100%;
            height: 100%;
            background-position: center;
            object-fit: cover;
            position: absolute;
            background-repeat: no-repeat;
            z-index: -1;
            background-size: 100% !important;
        }

    </style>
    <link href="admin_asset/css/notify.css" rel="stylesheet">
    <div class="container-fuild ">
        <div class="notify--show  ">
            <div class="overlayNotify"></div>
            <div class="form-notify ">
                <h3>Bạn có muốn giới thiệu về đặc sản hay video không?</h3>
                <div class="accept ">
                    <button class="btn btn-secondary green"><a
                            href="home/getVideo/{{ $id }}/{{ $idDiaDiem }}">Video</a></button>
                    <button class="btn btn-secondary green"><a
                            href="home/getCulinary/{{ $id }}/{{ $idDiaDiem }}">Đặc sản</a></button>
                    <button class="btn btn-secondary red"><a href="home/home/{{ $id }}"> Trở lại</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
