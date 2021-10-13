@include('index')
<div class=" bg-otp">
    <div class="form fadeInDown form-otp">
        <div class=" form-login ">
            <h2 style="color:#1976d2;">Nhập mật khẩu mới</h2>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <form action="resetPass/{{$User->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group row">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu mới"
                        require>
                </div>
                <div class="form-group row">
                    <input type="password" class="form-control" id="password1" name="password1"
                        placeholder="Nhập lại mật khẩu"
                        require>
                </div>
                <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
</div>

