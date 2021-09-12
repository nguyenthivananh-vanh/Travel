@extends('layout.index')
@section('content')
<link rel="stylesheet" href="admin_asset/css/pagination.css">
<section id="popular" class="section section-popular scrollspy">
  <div class="container-fuild">
        <div class="row">            
            <div class="col-12">
                <h4 class="center">
                <span class="teal-text">Popular</span> Places</h4>
            </div>
        </div>
        @if(isset($user))
        <div class="row">
            @foreach ($noibat as $noibat)
            <div class="col-4">
                <div class="card">
                    <a href="home/view/{{$noibat->id}}/{{$noibat->TacGia}}/{{$user->id}}">
                    <div class="card-image">
                        <img class="fit-img" style="height:200px" src="upload/diadiem/{{$noibat->HinhAnh}}" alt="img">
                        <span class="card-title">{{$noibat->TieuDe}}</span>
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
                        text-overflow: ellipsis;">{{$noibat->TomTat}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else 
        <div class="row">
            @foreach ($noibat as $noibat)
            <div class="col-4">
                <div class="card">
                    <a href="home/view/{{$noibat->id}}/{{$noibat->TacGia}}">
                    <div class="card-image">
                        <img class="fit-img" style="height:200px" src="upload/diadiem/{{$noibat->HinhAnh}}" alt="img">
                        <span class="card-title ">{{$noibat->TieuDe}}</span>
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
                        text-overflow: ellipsis;">{{$noibat->TomTat}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

  </div>
        

</section>


<!-- Section: Gallery -->

<section id="popular" class="section section-popular scrollspy">
    <div class="container-fuild">
        <div class="row">
            
            <div class="col-12">
                <h4 class="center">
                <span class="teal-text"></span> Places</h4>
            </div>
        </div>
        @if(isset($user))
        <div class="row">
            @foreach ($diadiem as $ddiem)
            <div class="col-4">
                <div class="card">
                  <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}/{{$user->id}}">
                    <div class="card-image">
                        <img class="fit-img" style="height:200px" src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                        <span class="card-title">{{$ddiem->TieuDe}}</span>
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
                        text-overflow: ellipsis;">{{$ddiem->TomTat}}</p>
                    </div>
                </div>   
            </div>
            @endforeach
        </div>
      
        @else
        <div class="row">
            @foreach ($diadiem as $ddiem)
            <div class="col-4">
                <div class="card">
                    <a href="home/view/{{$ddiem->id}}/{{$ddiem->TacGia}}">
                    <div class="card-image">
                        <img class="fit-img" style="height:200px" src="upload/diadiem/{{$ddiem->HinhAnh}}" alt="img">
                        <span class="card-title">{{$ddiem->TieuDe}}</span>
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
                        text-overflow: ellipsis;">{{$ddiem->TomTat}}</p>
                    </div>
                </div>
    
            </div>
    
            @endforeach
        </div>
          
        @endif
        
          
        <div class="row">
            <div class="page">
                {{$diadiem->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
  
  </section>
  
  @endsection
      
  @section('script')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
  var showFiller=true;
  function showNavbar(){
    this.showFiller =!this.showFiller;
  }
  <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
  </script>
      
  @endsection