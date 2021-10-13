@extends('index')
@section('content')
<link href="admin_asset/css/admin.css" rel="stylesheet">
@include('admin.layout.header')


    <section class="section section-Details grey lighten-4">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="post">
                        <div class="post-header" >
                            <div class="post-title  ml-2">
                                <h3 style="font-weight:bold;text-align:center">{{$DiaDiem->TieuDe}}</h3>
                            </div>
                            <div class="author row">
                                <div class="col-1">
                                    <img src="upload/users/{{$userAuthor->Avatar}}" class="circle view-admin-img" style='width:50px; height:50px' alt="Avatar User">
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
                            <span style="padding: 10px"><i class="fas fa-eye" style="color:#277fbc"></i><span style="padding: 10px">{{$DiaDiem->SoLuotXem}}</span></span>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="card-action">
                    <button class="btn green"><a style="color: white" href="admin/diadiem/delete/{{$DiaDiem->id}}/{{$user->id}}"> Xoá</a></button>
                    <button class="btn green"><a style="color: white" href="admin/diadiem/duyet/{{$DiaDiem->id}}/{{$user->id}}"> Duyệt</a></button>
                    <button class="btn green"><a style="color: white" href="admin/diadiem/list/{{$user->id}}"> Trở lại</a></button>
                </div>
            </div> 
        </div>     
    </section>
</div>



@include('layout.footer')   
@endsection