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
        <h2 style="color:#1976d2;">Bạn có muốn giới thiệu địa điểm này qua video không?</h2>
        <br>
        <div class="accept ">
            <button class="green"><a href="home/getVideo/{{$id}}/{{$idDiaDiem}}">Có chứ</a></button>
            <button class="red" ><a href="home/home/{{$id}}"> Không</a></button>
        </div>
    </div>
  </div>
    
    



