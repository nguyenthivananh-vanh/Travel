@include('index')

<div class=" bg-otp">
    <div class="form fadeInDown form-otp">
        <div class=" form-login ">
            <h2 style="color:#1976d2;">Nhập địa chỉ Email</h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach
                </div>
            @endif
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <form action="/forgotPassWord" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group row">
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter email" require>
                </div>
                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                </div>
                <br />
                @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display:block">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif

                <button type="submit">Next</button>
            </form>
        </div>
    </div>
