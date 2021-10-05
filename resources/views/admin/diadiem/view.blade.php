@extends('index')
@section('content')
 
@include('layout.header')

<div class="container">
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
        </div>
        <div class="card-action">
            <button class="btn green"><a style="color: white" href="admin/diadiem/delete/{{$DiaDiem->id}}/{{$user->id}}"> Xoá</a></button>
            <button class="btn green"><a style="color: white" href="admin/diadiem/duyet/{{$DiaDiem->id}}/{{$user->id}}"> Duyệt</a></button>
            <button class="btn green"><a style="color: white" href="admin/diadiem/list/{{$user->id}}"> Trở lại</a></button>
        </div>
        <div class="row"></div>      
    </section>
</div>



@include('layout.footer')   
@endsection