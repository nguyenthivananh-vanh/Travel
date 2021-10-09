@extends('admin.layout.index')
@section('content')
<link type="text/css" rel="stylesheet" href="admin_asset/css/materialize.min.css" media="screen,projection" />
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
                            <form action="admin/diadiem/update/{{$diadiem->id}}/{{$user->id}}" method="POST"
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
                                              style="width: 700px;height:1000px; ">{{$diadiem->NoiDung}}</textarea>
                                </div>
                                <div class="input-field">
                                    <label for="tacgia">Tác giả</label><br>
                                    <input type="text" id="tacgia" value="{{$diadiem->TacGia}}" name="tacgia">
                                </div>
                                <div class="form-group">
                                    <label>Tỉnh Thành</label><br>
                                    <input list="html" name="tinh"/>
                                    <datalist id="html">
                                        <option value="An Giang">An Giang</option>
                                        <option value="Bà Rịa – Vũng Tàu">Bà Rịa – Vũng Tàu</option>
                                        <option value="Bạc Liêu">Bạc Liêu</option>
                                        <option value="Bắc Giang">Bắc Giang</option>
                                        <option value="Bắc Kạn">Bắc Kạn</option>
                                        <option value="Bắc Ninh">Bắc Ninh</option>
                                        <option value="Bến Tre">Bến Tre</option>
                                        <option value="Bình Dương">Bình Dương</option>
                                        <option value="Bình Định">Bình Định</option>
                                        <option value="Bình Phước">Bình Phước</option>
                                        <option value="Bình Thuận">Bình Thuận</option>
                                        <option value="Cà Mau">Cà Mau</option>
                                        <option value="Cao Bằng">Cao Bằng</option>
                                        <option value="Cần Thơ">Cần Thơ</option>
                                        <option value="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Đắk Lắk">Đắk Lắk</option>
                                        <option value="Đắk Nông">Đắk Nông</option>
                                        <option value="Điện Biên">Điện Biên</option>
                                        <option value="Đồng Nai">Đồng Nai</option>
                                        <option value="Đồng Tháp">Đồng Tháp</option>
                                        <option value="Gia Lai">Gia Lai</option>
                                        <option value="Hà Giang">Hà Giang</option>
                                        <option value="Hà Nam">Hà Nam</option>
                                        <option value="Hà Nội">Hà Nội</option>
                                        <option value="Hà Tĩnh">Hà Tĩnh</option>
                                        <option value="Hải Dương">Hải Dương</option>
                                        <option value="Hải Phòng">Hải Phòng</option>
                                        <option value="Hậu Giang">Hậu Giang</option>
                                        <option value="Hòa Bình">Hòa Bình</option>
                                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                        <option value="Hưng Yên">Hưng Yên</option>
                                        <option value="Khánh Hòa">Khánh Hòa</option>
                                        <option value="Kiên Giang">Kiên Giang</option>
                                        <option value="Kon Tum">Kon Tum</option>
                                        <option value="Lai Châu">Lai Châu</option>
                                        <option value="Lạng Sơn">Lạng Sơn</option>
                                        <option value="Lào Cai">Lào Cai</option>
                                        <option value="Lâm Đồng">Lâm Đồng</option>
                                        <option value="Long An">Long An</option>
                                        <option value="Nam Định">Nam Định</option>
                                        <option value="Nghệ An">Nghệ An</option>
                                        <option value="Ninh Bình">Ninh Bình</option>
                                        <option value="Ninh Thuận">Ninh Thuận</option>
                                        <option value="Phú Thọ">Phú Thọ</option>
                                        <option value="Phú Yên">Phú Yên</option>
                                        <option value="Quảng Bình">Quảng Bình</option>
                                        <option value="Quảng Nam">Quảng Nam</option>
                                        <option value="Quảng Ngãi">Quảng Ngãi</option>
                                        <option value="Quảng Ninh">Quảng Ninh</option>
                                        <option value="Quảng Trị">Quảng Trị</option>
                                        <option value="Sóc Trăng">Sóc Trăng</option>
                                        <option value="Sóc Trăng">Sóc Trăng</option>
                                        <option value="Tây Ninh">Tây Ninh</option>
                                        <option value="Thái Bình">Thái Bình</option>
                                        <option value="Thái Nguyên">Thái Nguyên</option>
                                        <option value="Thanh Hóa">Thanh Hóa</option>
                                        <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                        <option value="Tiền Giang">Tiền Giang</option>
                                        <option value="Trà Vinh">Trà Vinh</option>
                                        <option value="Tuyên Quang">Tuyên Quang</option>
                                        <option value="Vĩnh Long">Vĩnh Long</option>
                                        <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                        <option value="Yên Bái">Yên Bái</option>
                                    </datalist>
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
                                    <button class="btn green">Cập nhật</button>
                                    <button class="btn red">Xoá</button>
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


