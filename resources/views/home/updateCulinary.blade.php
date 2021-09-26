@extends('index')
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
                            <form action="home/updateCulinary/{{$id}}/{{$tacgia}}/{{$idUser}}/{{$MonAn->id}}" method="POST"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="input-field">
                                    <label for="title">Tên Món Ăn</label><br>
                                    <input type="text" id="tenmonan" value="{{$MonAn->TenMonAn}}" name="tenmonan">
                                </div>
                                <div class="input-field">
                                    
                                    <label for="tacgia">Tiêu Đề</label><br>
                                    <input type="text" id="tieude" value="{{$MonAn->TieuDe}}" name="tieude">
                        
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
                               
                               
                                {{-- <div>
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
                                    @endif --}}
                                    <div class="card-action">
                                        <button class="btn green">Update</button>
                                        <button class="btn red">Reset</button>
                                        <button type="button" class="btn btn-success" id="btnSave" onClick="saveEditPost()">Cập nhập (new)</button>
                                    <button type="button" class="btn btn red" id="btnDelete" onClick="deleteEdit()">
                                    Delete
                                </button>
                                     
                                    </div>
                                {{-- </div> --}}
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
         <!-- Modal Delete -->

         <div id="deleteEdit" class="modal-view"> 
        <div class="modal-content"style="width:500px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn xóa bài viết không?</h5>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  onclick="document.getElementById('deleteEdit').style.display='none'" class="cancelbtn">Quay lại</button>
                <button type="button" class="btn btn red" onclick="document.getElementById('deleteEdit').style.display='none'" class="deletebtn">Xóa bài</button>
            </div>
            </div>
            </div>
        </div>


        <!-- Modal Edit -->
        <div id="saveEdit" class="modal-view" style="z-index:10;"> 
        <div class="modal-content"style="width:500px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bạn có chắc là muốn cập nhập không?</h5>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary"  onclick="document.getElementById('saveEdit').style.display='none'" class="cancelbtn">Đóng</button>
        <button type="button" class="btn btn red" onclick="document.getElementById('saveEdit').style.display='none'" class="deletebtn">Lưu</button>
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
@section('script')
    <script type="text/javascript" src="admin_asset/js/homepage.js"></script>

        
@endsection




