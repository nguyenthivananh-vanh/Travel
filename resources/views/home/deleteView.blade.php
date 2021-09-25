@include('index')
<style>
    .accept{
        display: flex;
        justify-content: space-around;
    }
    .accept button{
        width: 30%;
    }
    .accept a{
        color: white;
        text-decoration: none;
    }
</style>

  <div class="login-page">
    <div class="form form-login">
        <h2 style="color:#1976d2;">Bạn có chắc chắn muốn xoá bài viết?</h2>
        <br>
        
        <div class="accept ">
            <button class="green"><a href="home/acceptDelete/{{$id}}/{{$tacgia}}/{{$idUser}}">Xoá bài</a></button>
            <button class="red" ><a href="home/backView/{{$id}}/{{$tacgia}}/{{$idUser}}"> Trở lại</a></button>
        </div>
    </div>
  </div>
    
    



