
@extends('index')
@section('content')
<style>
    .form-email-header{
        padding: 20px;
        color: #1976d2;

    }
    .form-email-content p{
        margin-bottom: 15px;
    }
</style>
<div align="center" style="background: #e6e6e6; height:250px; width: 30%; border-radius: 5px " >
    <div class="form-email">
        <div class="form-email-header">
            <h3  >MyVietNam</h3>
            <h4 >Chào mừng bạn đến với MyVietNam</h4>
        </div>
        <div class="form-email-content">
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi trong suốt thời gian vừa quá. Chúng tôi sẽ cố gắng hoàn thiện website để phục vụ người dùng một cách tốt nhất!</p>
            <p style="color: red"><b>Mã OTP của bạn hiệu lực trong 5 phút </b> <h3>{{$otp}}</h3></p>
        </div>
    </div>
    
</div>
    
@endsection
