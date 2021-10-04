@include('index')
<div class="login-page">
    <div class="form form-login">
        <h2 style="color:#1976d2;">Nhập mã OTP</h2>
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
        <form action="otp/{{$User->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group row">
                <input type="email" value="{{$User->email}}" class="form-control" id="email" name="email"
                       aria-describedby="emailHelp"
                       placeholder="Enter email" require>
            </div>
            <div class="form-group row">
                <input type="text" value="" class="form-control" id="otp" name="otp" placeholder="OTP"
                       require>
                <label style="color: red; float: left">Lưu ý: Mã OTP chỉ có hiệu lực 5 phút sau khi gửi</label>
            </div>
            <button type="submit">Next</button>
        </form>
    </div>
</div>

