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
                                    <span class="card-title">Vùng miền</span>
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

                            <form action="admin/vungmien/update/{{ $vungmien->id }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="input-field">
                                    <label for="title">Tên</label><br>
                                    <input type="text" id="title" name="ten" value="{{ $vungmien->Ten }}" />
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
