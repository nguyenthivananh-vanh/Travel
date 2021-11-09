@extends('index')
@section('content')
    <link rel="stylesheet" href="admin_asset/css/updateUser.css">
    <div class="wrapper">
        <form action="user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            <div class="container-fuild">
                <div class="container">
                    <div class="contain">
                        <div class="content">
                            <h3 class="title">Cập nhật thông tin</h3>
                            @if (session('thongbao'))
                                <div class="alert alert-success">
                                    {{ session('thongbao') }}<br>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}<br>
                                    @endforeach
                                </div>
                            @endif
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="ten" value="{{ $user->Ten }}"
                                    aria-describedby="nameHelp" placeholder="Enter name" required>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" aria-describedby="emailHelp" placeholder="Enter email"
                                    require>
                            </div>

                            <div class="mb-3 check-is-changepassword">
                                <label><input type="checkbox" style="opacity: 1;position: relative">Thay đổi mật khẩu
                                </label>
                            </div>
                            <div class="change-password display-none">
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="pass"
                                        value="{{ $user->password }}" placeholder="Password" require>
                                </div>
                                <div class="mb-3">
                                    <label>Password Repeat</label>
                                    <input type="password" class="form-control" id="password_rp" name="confirm"
                                        value="{{ $user->password }}" placeholder="Repeat Password" require>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Avatar</label>
                                <p><img src="upload/users/{{ $user->Avatar }}" width="400px" alt=""></p>
                                <input type="file" class="form-control" id="hinhanh" name="hinhanh" />
                            </div>
                            <button type="submit">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        const isCKpassword = $('.check-is-changepassword input[type="checkbox"]')
        $('.check-is-changepassword').on('click', function() {
            if (isCKpassword.is(':checked')) {
                $('.change-password').show();
            } else {
                $('.change-password').hide();
            }
        })
    </script>

@endsection
