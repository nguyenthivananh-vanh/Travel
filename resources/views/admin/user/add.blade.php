@extends('admin.layout.index')
@section('content')
    <link type="text/css" rel="stylesheet" href="admin_asset/css/materialize.min.css" media="screen,projection" />
    <style>
        #level {
            margin-top: 20px;
            font-size: 1.1rem;
        }

    </style>
    <!-- Section: Details -->
    <section class="section section-Details grey lighten-4">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m6">
                                    <span class="card-title">User</span>
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{ $err }}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if (session('thongbao'))
                                <div class="alert alert-success">
                                    {{ session('thongbao') }}<br>
                                </div>
                            @endif
                            <form action="admin/user/add/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="input-field">
                                    <label>Tên tài khoản</label><br>
                                    <input type="text" id="ten" value="" name="ten">
                                </div>
                                <div class="input-field">
                                    <label>Email</label><br>
                                    <input type="email" id="mail" value="" name="email">
                                </div>


                                <div class="input-field">
                                    <label>Password</label><br>
                                    <input type="password" id="pass" value="" name="pass">
                                </div>
                                <div class="input-field">
                                    <label>Nhập lại Password</label><br>
                                    <input type="password" id="confirm" value="" name="confirm">
                                </div>
                                <div class="input-field">
                                    <label for="hinhanh">Avatar</label><br><br>
                                    <input type="file" id="hinhanh" name="hinhanh" class="form-control" />
                                </div>
                                <div>
                                    <label for="" id="level">Phân quyền</label><br><br>
                                    <section class="section section-Details grey lighten-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="phanquyen" id="inlineRadio1"
                                                value="0">
                                            <label class="form-check-label" for="inlineRadio1">User</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="phanquyen" id="inlineRadio2"
                                                value="1">
                                            <label class="form-check-label" for="inlineRadio2">Admin</label>
                                        </div>
                                    </section>
                                </div>
                                <div class="card-action">
                                    <button class="btn green">Thêm</button>
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
        var deleteDiaDiemModal = document.getElementById("deleteDiaDiem");
        var addDiaDiemModal = document.getElementById("addDiaDiem");

        function deleteNews() {
            document.getElementById('deleteDiaDiem').style.display = 'block';

        }

        function createNews() {
            document.getElementById('addDiaDiem').style.display = 'block';
        }
        window.onclick = function(event) {
            if (event.target == deleteDiaDiemModal || event.target == addDiaDiemModal) {
                document.getElementById('deleteDiaDiem').style.display = "none";
                document.getElementById('addDiaDiem').style.display = "none";
            }
        }
        $(document).ready(function() {
            $("#vungmien").change(function() {
                var idvm = $(this).val();
                $.get("admin/ajax/dacdiem/" + idvm, function(data) {
                    $("#dacdiem").html(data);
                });
            });
        });
    </script>
@endsection
