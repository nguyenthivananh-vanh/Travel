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
                                    <span class="card-title">Món Ăn</span>
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
                            <form action="admin/monan/duyet/{{$MonAn->id}}" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="input-field">
                                    <label for="title">Tên Món Ăn</label><br>
                                    <input type="text" id="tenmonan" value="{{$MonAn->TenMonAn}}" name="tenmonan">
                                </div>
                                <div class="input-field">
                                    <label for="hinhanh">Image</label><br><br>
                                    <p><img src="upload/monan/{{$MonAn->HinhAnh}}" width="400px" alt=""></p>
                                    <input type="file" id="hinhanh" name="hinhanh" class="form-control"/>
                                </div>
                                <div class="input-field">
                                    <label for="ckeditor">Mô Tả Món Ăn</label><br><br>
                                    <textarea class="textarea" id="ckeditor" name="mota"
                                              style="width: 700px; height: 200px; ">{{$MonAn->MoTa}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm</label><br>
                                    <input value="{{$MonAn->idDiaDiem}}" list="html" name="iddd"/>
                                    <datalist id="html">
                                        @foreach ($DiaDiem as $diadiem)
                                            <option value="{{$diadiem->id}}">{{$diadiem->TieuDe}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="input-field">
                                    <label for="tacgia">Tác giả</label><br>
                                    <input type="text" id="tacgia" value="{{$MonAn->tacgia}}" name="tacgia">
                                </div>
                                <div>
                                    <label for="" id="level">Trạng thái bài viết</label><br><br>
                                    @if($MonAn->TrangThai ==1)
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
                                    @else
                                        <section class="section section-Details grey lighten-4">
                                            <div class="form-check form-check-inline">
                                                <input checked class="form-check-input" type="radio" name="duyet"
                                                       id="inlineRadio1" value="0">
                                                <label class="form-check-label" for="inlineRadio1">Không cấp
                                                    phép</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="duyet"
                                                       id="inlineRadio2" value="1">
                                                <label class="form-check-label" for="inlineRadio2">Cấp phép đăng</label>
                                            </div>
                                        </section>
                                    @endif
                                    <div class="card-action">
                                        <button class="btn green">Update</button>
                                        <button class="btn red">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--@section('script')--}}
{{--    <script>--}}

{{--        $(document).ready(function(){--}}
{{--            $("#vungmien").change(function(){--}}
{{--                var idvm = $(this).val();--}}
{{--                $.get("admin/ajax/dacdiem/"+idvm,function(data){--}}
{{--                    $("#dacdiem").html(data);--}}
{{--                });--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}




