<link href="admin_asset/css/home.css" rel="stylesheet">
<div class="col-2 m-0 c-0" style="box-shadow: 0 10px 20px rgba(0,0,0,0.23), 0 6px 6px rgba(0,0,0,0.19);">
    <ul class="list-group" id="menu">
      <h5 class="menu__title">Vùng Miền</h5>
      @foreach ($vungmien as $vm)            
      <li href="#" class="list-group-item menu1 list-item-left-menu">
        {{$vm->Ten}}
      </li>             
      <ul>
        @foreach ($vm->dacdiem as $dacdiem)       
        @if(isset($user))
            <li class="list-group-item list-group-item-dd list-item-left-menu">
          <a href="home/dacdiem/search/{{$dacdiem->id}}/{{$user->id}}">{{$dacdiem->Ten}}</a>
        </li> 
        @else
        <li class="list-group-item list-group-item-dd list-item-left-menu">
          <a href="home/dacdiem/search/{{$dacdiem->id}}">{{$dacdiem->Ten}}</a>
        </li>
        @endif
        @endforeach
      </ul>
        @endforeach
    </ul>
  </div>