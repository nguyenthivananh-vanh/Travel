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
                            <form action="admin/monan/add" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="input-field">
                                    <label for="title">Tên Món Ăn</label><br>
                                    <input type="text" id="tenmonan" value="" name="tenmonan">
                                </div>
                                <div class="input-field">
                                    <label for="hinhanh">Image</label><br><br>
                                    <input type="file" id="hinhanh" name="hinhanh" class="form-control"/>
                                </div>
                                <div class="input-field">
                                    <label for="ckeditor">Mô Tả Món Ăn</label><br><br>
                                    <textarea class="textarea" id="ckeditor" name="mota"
                                              style="width: 700px; height: 200px; "></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Địa Điểm</label><br>
                                    <input list="html" name="iddd" />
                                    <datalist id="html">
                                        @foreach ($DiaDiem as $diadiem)
                                            <option value="{{$diadiem->id}}">{{$diadiem->TieuDe}}</option>
                                        @endforeach
                                    </datalist>
                                </div>
                                    <div class="input-field">
                                        <label for="tacgia">Tác giả</label><br>
                                        <input type="text" id="tacgia" value="" name="tacgia">
                                    </div>
                                <div class="card-action">
                                    <button class="btn green">Add</button>
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




