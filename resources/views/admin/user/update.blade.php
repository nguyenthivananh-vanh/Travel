@extends('index')
@section('content')
<link rel="stylesheet" href="admin_asset/css/updateUser.css">

<div class="wrapper">

<form action="user/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
    <div class="container-fuild">
        <div class="container">
            <div class="contain">
                <div class="content">
                    <h3 class="title">Cập nhật thông tin</h3>
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}<br>
                            </div>
                        @endif
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="ten" value="{{$user->Ten}}"
                            aria-describedby="nameHelp" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                            aria-describedby="emailHelp" placeholder="Enter email" require>
                    </div>

                    <div class="mb-3 check-is-changepassword">
                        <label><input type="checkbox" style="opacity: 1;position: relative">Thay đổi mật khẩu </label>
                    </div>
                    <div class="change-password display-none">
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="pass"
                                value="{{$user->password}}" placeholder="Password" require>
                        </div>
                        <div class="mb-3">
                            <label>Password Repeat</label>
                            <input type="password" class="form-control" id="password_rp" name="confirm"
                                value="{{$user->password}}" placeholder="Repeat Password" require>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Avatar</label>
                        <p><img src="upload/users/{{$user->Avatar}}" width = "400px" alt=""></p>
                        <input type="file" class="form-control" id="hinhanh" name="hinhanh"/>
                    </div>
                    <button type="submit">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</form>

</div>
{{-- <form method="post" action="{{URL::to('News/update')}}/{{$new->id}}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="container-fuild">
        <div class="container">
            <div class="contain">
                <div class="content">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Chọn tệp</label>
                        <input type="file" class="form-control" name="image" value="{{$new->image}}" id="formGroupExampleInput">
                        <br>
                        <img src="/images/{{ $new->image }}" width="100px">
                      </div>
                       <span class="alert-danger">@error('image'){{$message}} @enderror</span>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Nội dung</label>
                        <input type="text" class="form-control" name="short_description" value="{{$new->short_description}}" id="formGroupExampleInput2">
                      </div>
                       <span class="alert-danger">@error('short_description'){{$message}} @enderror</span>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="description" value="{{$new->description}}" id="formGroupExampleInput2">
                      </div>
                       <span class="alert-danger">@error('description'){{$message}} @enderror</span>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Người viết</label>
                        <input type="text" class="form-control" name="author" value="{{$new->create_by}}" id="formGroupExampleInput2">
                      </div>
                       <span class="alert-danger">@error('author'){{$message}} @enderror</span>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Danh mục</label>
                        <select class="form-select" aria-label="Default select example" name="new_category_id">
                            @foreach ($new_category as $row)
                                @if ($row->id == $new->new_category_id)
                                <option value="{{$row->id}}">{{$row->title}}</option>
                                @endif
                            @endforeach
                            @foreach ($new_category as $row)
                                <option value="{{$row->id}}">{{$row->title}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                        <input type="Submit" class="form-control" name="submit" id="formGroupExampleInput2" >
                      </div>
                </div>
            </div>
        </div>
    </div>

</form> --}}
{{-- @endforeach --}}





@endsection
@section('script')

<script>
    const isCKpassword = $('.check-is-changepassword input[type="checkbox"]')
    $('.check-is-changepassword').on('click',function (){
        if (isCKpassword.is(':checked')){
            $('.change-password').show();
        }else {
            $('.change-password').hide();
        }
    })
</script>

@endsection

