<link href="admin_asset/css/home.css" rel="stylesheet">
<div class="col-2">
    <ul class="list-group" id="menu">
      <h4 class="menu__title">Vùng Miền</h4>
      @foreach ($vungmien as $vm)            
      <li href="#" class="list-group-item menu1">
        {{$vm->Ten}}
      </li>             
      <ul>
        @foreach ($vm->dacdiem as $dacdiem)         
        <li class="list-group-item list-group-item-dd">
          <a href="home/dacdiem/search/{{$dacdiem->id}}">{{$dacdiem->Ten}}</a>
        </li>
        @endforeach
      </ul>
        @endforeach
    </ul>
  </div>