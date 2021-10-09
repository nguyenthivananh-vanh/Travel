@extends('index')
@section('content')
<link href="admin_asset/css/admin.css" rel="stylesheet">
@include('admin.layout.header')
<section class="section section-Details grey lighten-4">
    <div class="container">
        <div class="row">
            <div class="col s12">
<div class="container">
    <section class="content px-2 mt-6" >
        <div class="container-fluid mt-2">
            <div class="post">
                <div class="post-header">
                    <div class="post-tilte  ml-2">
                    
                    <h3 style="font-weight:bold">{{$monan->TenMonAn}}
                    </h3>
                    </div>
                   
                </div>
                <div class="post-content">     
                    <p ><i>{{$monan->TieuDe}}</i></p>         
                    {!! html_entity_decode( $monan->MoTa) !!}
                </div>
                <div class="post-footer text-right" style="text-align:right">
                   
                    {{-- <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span style="padding: 10px">{{$DiaDiem->SoLuotXem}}</span></span> --}}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card-action view-admin-culinary">           
                    <button class="btn green"><a style="color: white" href="admin/monan/list/{{$user->id}}"> Trở lại</a></button>
                </div>
            </div>
        </div>      
    </section>
</div>



@include('layout.footer')   
@endsection