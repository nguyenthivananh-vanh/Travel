@extends('admin.layout.index')
@section('content')
    <!-- Section: Details -->
    <section class="section section-Details grey lighten-4">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m6">
                                    <span class="card-title">Địa điểm</span>

                                </div>

                            </div>
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}<br>
                                </div>
                            @endif
                            <form action="admin/diadiem/update/{{$diadiem->id}}" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label>Vùng miền</label><br>
                                    <select class="form-control" name="VungMien" id="vungmien">
                                        @foreach ($vungmien as $vm)
                                            <option
                                                @if($diadiem->dacdiem->vungmien->id == $vm->id)
                                                {{"selected"}}
                                                @endif
                                                value="{{$vm->id}}">{{$vm->Ten}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Đặc điểm</label><br>
                                    <select class="form-control" name="DacDiem" id="dacdiem">
                                        @foreach ($dacdiem as $dd)
                                            <option
                                                @if($diadiem->dacdiem->id == $dd->id)
                                                {{"selected"}}
                                                @endif
                                                value="{{$dd->id}}">{{$dd->Ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-field">
                                    <label for="title">Tiêu Đề</label><br>
                                    <input type="text" id="tieude" value="{{$diadiem->TieuDe}}" name="tieude">
                                </div>
                                <div class="input-field">
                                    <label for="tomtat">Tóm Tắt</label><br>
                                    <input type="text" id="tomtat" value="{{$diadiem->TomTat}}" name="tomtat">
                                </div>
                                <div class="input-field">
                                    <label for="hinhanh">Image</label><br><br>
                                    <p><img src="upload/diadiem/{{$diadiem->HinhAnh}}" width="400px" alt=""></p>
                                    <input type="file" id="hinhanh" name="hinhanh" class="form-control"/>

                                </div>
                                <div class="input-field">
                                    <label for="ckeditor">Nội dung</label><br><br>
                                    <textarea class="textarea" id="ckeditor" name="noidung"
                                              style="width: 700px height:1000px; ">{{$diadiem->NoiDung}}</textarea>
                                </div>
                                <div class="input-field">
                                    <label for="tacgia">Tác giả</label><br>
                                    <input type="text" id="tacgia" value="{{$diadiem->TacGia}}" name="tacgia">
                                </div>
                                <div>
                                    <label for="" id="level">Trạng thái bài viết</label><br><br>
                                    <section class="section section-Details grey lighten-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="duyet"
                                                   id="inlineRadio1" value="0">
                                            <label class="form-check-label" for="inlineRadio1">Không cấp
                                                phép</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input checked class="form-check-input" type="radio" name="duyet"
                                                   id="inlineRadio2" value="1">
                                            <label class="form-check-label" for="inlineRadio2">Cấp phép đăng</label>
                                        </div>
                                    </section>
                                </div>

                                <div class="card-action">
                                    <button class="btn green">Update</button>
                                    <button class="btn red">Reset</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>

        $(document).ready(function () {
            $("#vungmien").change(function () {
                var idvm = $(this).val();
                $.get("admin/ajax/dacdiem/" + idvm, function (data) {
                    $("#dacdiem").html(data);
                });
            });
        });
    </script>
@endsection


