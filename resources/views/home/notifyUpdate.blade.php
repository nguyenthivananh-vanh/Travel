@include('index')
<style>
    .accept {
        display: flex;
        justify-content: space-around;
    }

    .accept button {
        width: 30%;
    }

    .accept a {
        color: white;
        text-decoration: none;
    }

</style>

<div class="login-page">
    <div class="form form-login">
        <h2 style="color:#1976d2;">Bạn muốn cập nhật?</h2>
        <br>
        <div class="accept ">
            <button class="green"><a
                    href="home/updateView/{{ $id }}/{{ $tacgia }}/{{ $idUser }}">Địa
                    điểm</a></button>
            <button class="green"><a
                    href="home/updateCulinary/{{ $id }}/{{ $tacgia }}/{{ $idUser }}">Đặc
                    sản</a></button>
            <button class="green"><a
                    href="home/updateVideo/{{ $id }}/{{ $tacgia }}/{{ $idUser }}">
                    Video</a></button>
        </div>
    </div>
</div>
